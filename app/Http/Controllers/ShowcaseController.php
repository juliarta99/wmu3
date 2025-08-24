<?php

namespace App\Http\Controllers;

use App\Models\Showcase;
use App\Models\Contributor;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShowcaseController extends Controller
{
    public function index(Request $request) {
        $title = "Dashboard Showcase - ";
        
        $query = Showcase::query();
        
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhereHas('team', function ($t) use ($search) {
                    $t->where('name', 'like', "%{$search}%");
                });
            });
        }
        
        if ($request->filled('year')) {
            $year = $request->year;

            $query->whereHas('team', function ($q) use ($year) {
                $q->where('year', $year);
            });
        }

        $sortBy = $request->get('sort_by', 'latest');
        switch ($sortBy) {
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'year':
                $query->join('teams', 'teams.id', '=', 'showcases.team_id')
                    ->orderBy('teams.year', 'desc')
                    ->select('showcases.*');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->latest();
                break;
        }
        
        $showcases = $query->with('team')->paginate(10)->appends($request->query());
        return view('dashboard.showcase.index', compact('title', 'showcases'));
    }

    public function create()  {
        $title = "Dashboard Create Showcase - ";
        $teams = Team::latest()->get();
        return view('dashboard.showcase.create', compact('title', 'teams'));
    }

    public function show(Showcase $showcase)  {
        $showcase->load('team', 'team.contributors');
        $title = "Dashboard Showcase ". $showcase->title ." - ";
        return view('dashboard.showcase.show', compact('title', 'showcase'));
    }

    public function edit(Showcase $showcase)  {
        $showcase->load('team');
        $teams = Team::latest()->get();
        $title = "Dashboard Edit Showcase - ";
        return view('dashboard.showcase.edit', compact('title', 'showcase', 'teams'));
    }

    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:100',
                'cover' => 'required|file|mimes:jpg,jpeg,png|max:1024',
                'team_id' => 'required|integer|exists:teams,id',
                'description' => 'required|string',
                'champion' => 'required|in:0,1,2,3',
                'link_youtube' => 'required|url',
            ], [
                'title.required' => 'Judul karya wajib diisi.',
                'title.string' => 'Judul karya harus berupa teks.',
                'title.max' => 'Judul karya maksimal 100 karakter.',
                
                'cover.required' => 'Cover karya wajib diupload.',
                'cover.file' => 'Cover harus berupa file.',
                'cover.mimes' => 'Cover harus berformat JPG, JPEG, atau PNG.',
                'cover.max' => 'Ukuran cover maksimal 1MB.',
                
                'team_id.required' => 'Tim wajib dipilih.',
                'team_id.integer' => 'ID tim tidak valid.',
                'team_id.exists' => 'Tim yang dipilih tidak ditemukan.',
                
                'description.required' => 'Deskripsi karya wajib diisi.',
                'description.string' => 'Deskripsi karya harus berupa teks.',
                
                'champion.required' => 'Status juara wajib dipilih.',
                'champion.in' => 'Status juara tidak valid. Pilih salah satu: Tidak mendapat juara(X), Juara 1, Juara 2, atau Juara 3.',
                
                'link_youtube.required' => 'Link YouTube wajib diisi.',
                'link_youtube.url' => 'Link YouTube harus berupa URL yang valid.',
            ]);

            $existingShowcase = Showcase::where('team_id', $validated['team_id'])->first();
            if ($existingShowcase) {
                $errorMessage = 'Tim ini sudah memiliki karya yang terdaftar. Setiap tim hanya dapat mengirimkan satu karya.';
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                    ], 422);
                }
                
                return redirect()->back()
                                ->with('error', $errorMessage)
                                ->withInput();
            }

            if ($validated['champion'] != 0) {
                $team = Team::find($validated['team_id']);
                $championExists = Showcase::whereHas('team', function($query) use ($team) {
                    $query->where('year', $team->year);
                })->where('champion', $validated['champion'])->first();

                if ($championExists) {
                    $championTitles = [
                        1 => 'Juara 1',
                        2 => 'Juara 2', 
                        3 => 'Juara 3'
                    ];
                    
                    $errorMessage = $championTitles[$validated['champion']] . ' untuk tahun ' . $team->year . ' sudah ada. Setiap peringkat juara hanya dapat diberikan kepada satu tim per tahun.';
                    
                    if ($request->expectsJson()) {
                        return response()->json([
                            'success' => false,
                            'message' => $errorMessage,
                        ], 422);
                    }
                    
                    return redirect()->back()
                                    ->with('error', $errorMessage)
                                    ->withInput();
                }
            }

            $ytid = $this->extractYoutubeId($validated["link_youtube"]);
            $showcaseExistsYtId = Showcase::where('youtube_id', $ytid)->exists();
            if (!$ytid || $showcaseExistsYtId) {
                if(!$ytid) {
                    $errorMessage = 'Link YouTube tidak valid. Pastikan menggunakan format URL YouTube yang benar!';
                } elseif ($showcaseExistsYtId) {
                    $errorMessage = 'Video YouTube ini sudah digunakan pada karya peserta lain!';
                }
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                    ], 422);
                }
                
                return redirect()->back()
                                ->with('error', $errorMessage)
                                ->withInput();
            }

            $data = [
                'title' => $validated['title'],
                'description' => $validated['description'],
                'champion' => $validated['champion'] == 0 ? null : $validated['champion'],
                'team_id' => $validated['team_id'],
                'youtube_id' => $ytid
            ];

            try {
                $data["cover"] = fileUpload($request->file('cover'), 'showcase/covers');
            } catch (\Exception $e) {
                $errorMessage = 'Gagal mengupload file cover. Pastikan file yang diupload sesuai dengan format yang diizinkan.';
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                    ], 500);
                }
                
                return redirect()->back()
                                ->with('error', $errorMessage)
                                ->withInput();
            }

            $showcase = Showcase::create($data);
        
            
            broadcastParseValue();
            $successMessage = 'Karya tim berhasil ditambahkan!';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                    'showcase' => $showcase,
                ], 201);
            }
            
            return redirect()->route('dashboard.team.index')
                            ->with('success', $successMessage);
                            
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessage = 'Data yang dimasukkan tidak valid. Periksa kembali form yang Anda isi.';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'errors' => $e->errors()
                ], 422);
            }
        
            return redirect()->back()
                            ->withErrors($e->errors())
                            ->withInput();
                            
        } catch (\Throwable $e) {
            $errorMessage = 'Terjadi kesalahan sistem.';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }
        
            return redirect()->back()
                            ->with('error', $errorMessage)
                            ->withInput();
        }
    }

    private function extractYoutubeId($url) {
        $pattern = '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([\w-]{11})/';
        preg_match($pattern, $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    public function update(Request $request, Showcase $showcase)
    {
        try {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:100',
                'cover' => 'sometimes|file|mimes:jpg,jpeg,png|max:1024',
                'description' => 'sometimes|string',
                'champion' => 'sometimes|in:0,1,2,3',
                'link_youtube' => 'sometimes|url',
            ], [
                'title.string' => 'Judul karya harus berupa teks.',
                'title.max' => 'Judul karya maksimal 100 karakter.',
                
                'cover.file' => 'Cover harus berupa file.',
                'cover.mimes' => 'Cover harus berformat JPG, JPEG, atau PNG.',
                'cover.max' => 'Ukuran cover maksimal 1MB.',
                
                'description.string' => 'Deskripsi karya harus berupa teks.',
                
                'champion.in' => 'Status juara tidak valid. Pilih salah satu: Tidak mendapat juara(X), Juara 1, Juara 2, atau Juara 3.',
                
                'link_youtube.url' => 'Link YouTube harus berupa URL yang valid.',
            ]);

            if (isset($validated['champion']) && $validated['champion'] != 0) {
                $team = Team::find($showcase->team_id);
                $championExists = Showcase::whereHas('team', function($query) use ($team) {
                    $query->where('year', $team->year);
                })
                ->where('champion', $validated['champion'])
                ->where('id', '!=', $showcase->id)
                ->first();

                if ($championExists) {
                    $championTitles = [
                        1 => 'Juara 1',
                        2 => 'Juara 2', 
                        3 => 'Juara 3'
                    ];
                    
                    $errorMessage = $championTitles[$validated['champion']] . ' untuk tahun ' . $team->year . ' sudah ada. Setiap peringkat juara hanya dapat diberikan kepada satu tim per tahun.';
                    
                    if ($request->expectsJson()) {
                        return response()->json([
                            'success' => false,
                            'message' => $errorMessage,
                        ], 422);
                    }
                    
                    return redirect()->back()
                                    ->with('error', $errorMessage)
                                    ->withInput();
                }
            }

            if (isset($validated['link_youtube'])) {
                $ytid = $this->extractYoutubeId($validated["link_youtube"]);
                $showcaseExistsYtId = Showcase::where('youtube_id', $ytid)->exists();
                if (!$ytid || $showcaseExistsYtId) {
                    if(!$ytid) {
                        $errorMessage = 'Link YouTube tidak valid. Pastikan menggunakan format URL YouTube yang benar!';
                    } elseif ($showcaseExistsYtId) {
                        $errorMessage = 'Video YouTube ini sudah digunakan pada karya peserta lain!';
                    }
                    
                    if ($request->expectsJson()) {
                        return response()->json([
                            'success' => false,
                            'message' => $errorMessage,
                        ], 422);
                    }
                    
                    return redirect()->back()
                                    ->with('error', $errorMessage)
                                    ->withInput();
                }
            }

            $data = [
                'title' => $validated['title'] ?? $showcase->title,
                'description' => $validated['description'] ?? $showcase->description,
                'champion' => array_key_exists('champion', $validated) 
                    ? ($validated['champion'] == 0 ? null : $validated['champion'])
                    : $showcase->champion,
            ];

            if (isset($validated['link_youtube'])) {
                $data['youtube_id'] = $ytid;
            }

            if ($request->hasFile('cover')) {
                try {
                    $data["cover"] = fileUpload($request->file('cover'), 'showcase/covers');
                    
                    if ($showcase->cover && Storage::disk('public')->exists($showcase->cover)) {
                        Storage::disk('public')->delete($showcase->cover);
                    }
                } catch (\Exception $e) {
                    $errorMessage = 'Gagal mengupload file cover. Pastikan file yang diupload sesuai dengan format yang diizinkan.';
                    
                    if ($request->expectsJson()) {
                        return response()->json([
                            'success' => false,
                            'message' => $errorMessage,
                        ], 500);
                    }
                    
                    return redirect()->back()
                                    ->with('error', $errorMessage)
                                    ->withInput();
                }
            }

            $showcase->slug = null;
            $showcase->update($data);
            
            $successMessage = 'Data showcase berhasil diperbarui!';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                    'showcase' => $showcase->fresh(),
                ], 200);
            }
            
            return redirect()->route('dashboard.team.index')
                            ->with('success', $successMessage);
                            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $errorMessage = 'Showcase tidak ditemukan.';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                ], 404);
            }
            
            return redirect()->back()
                            ->with('error', $errorMessage);
                            
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessage = 'Data yang dimasukkan tidak valid. Periksa kembali form yang Anda isi.';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'errors' => $e->errors()
                ], 422);
            }
        
            return redirect()->back()
                            ->withErrors($e->errors())
                            ->withInput();
                            
        } catch (\Throwable $e) {
            $errorMessage = 'Terjadi kesalahan sistem.';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }
        
            return redirect()->back()
                            ->with('error', $errorMessage)
                            ->withInput();
        }
    }

    public function destroy(Showcase $showcase) {
        try {
            DB::transaction(function () use ($showcase) {
                if ($showcase->cover && Storage::disk('public')->exists($showcase->cover)) {
                    Storage::disk('public')->delete($showcase->cover);
                }

                $showcase->delete();

            });
            broadcastParseValue();

            return response()->json([
                'success' => true,
                'message' => 'Karya peserta dan semua data terkait berhasil dihapus!'
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Karya peserta tidak ditemukan.'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus karya peserta.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
