<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShortLinkController extends Controller
{
    public function index(Request $request)
    {
        $title = "Dashboard Shortener - ";
        
        $query = ShortLink::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('back_half', 'like', '%' . $request->search . '%')
                    ->orWhere('link', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('count_visitors') && !empty($request->count_visitors)) {
            $sortByCountVisitors = $request->get('count_visitors', 'latest');
            switch ($sortByCountVisitors) {
                case 'most':
                    $query->orderBy('count_visitors', 'desc');
                    break;
                case 'least':
                    $query->orderBy('count_visitors', 'asc');
                    break;
                default:
                    break;
            }
        }
        
        $sortBy = $request->get('sort_by', 'latest');
        switch ($sortBy) {
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->latest();
                break;
        }
        
        $shorteners = $query->paginate(10)->appends($request->query());
        return view('dashboard.shortener.index', compact('title', 'shorteners'));
    }

    public function create()  {
        $title = "Dashboard Create Link - ";
        return view('dashboard.shortener.create', compact('title'));
    }

    public function edit(ShortLink $short_link)  {
        $title = "Dashboard Edit Link - ";
        $link = $short_link;
        return view('dashboard.shortener.edit', compact('title', 'link'));
    }
    
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'back_half' => [
                    'required',
                    'string',
                    'max:100',
                    'regex:/^[a-zA-Z0-9_-]+$/',
                    'unique:short_links,back_half'
                ],
                'link' => 'required|url|max:2000',
                'open_at' => 'required|date',
                'end_at' => 'required|date|after:open_at',
            ], [
                'name.required' => 'Nama shortener wajib diisi.',
                'name.string' => 'Nama shortener harus berupa teks.',
                'name.max' => 'Nama shortener maksimal 255 karakter.',
                
                'back_half.required' => 'Akhiran link wajib diisi.',
                'back_half.string' => 'Akhiran link harus berupa teks.',
                'back_half.max' => 'Akhiran link maksimal 100 karakter.',
                'back_half.regex' => 'Akhiran link hanya boleh mengandung huruf, angka, underscore, dan strip.',
                'back_half.unique' => 'Akhiran link sudah digunakan. Silakan pilih akhiran yang lain.',
                
                'link.required' => 'Link tujuan wajib diisi.',
                'link.url' => 'Link tujuan harus berupa URL yang valid.',
                'link.max' => 'Link tujuan maksimal 2000 karakter.',
                
                'open_at.required' => 'Waktu mulai wajib diisi.',
                'open_at.date' => 'Format waktu mulai tidak valid.',
                
                'end_at.required' => 'Waktu berakhir wajib diisi.',
                'end_at.date' => 'Format waktu berakhir tidak valid.',
                'end_at.after' => 'Waktu berakhir harus setelah waktu mulai.',
            ]);

            // Cek apakah back_half tidak menggunakan kata yang direserved
            $reservedWords = [
                'admin', 'dashboard', 'api', 'www', 'mail', 'ftp', 'localhost', 
                'root', 'support', 'noreply', 'postmaster', 'hostmaster',
                'app', 'home', 'index', 'main', 'test', 'dev', 'staging'
            ];
            
            if (in_array(strtolower($validated['back_half']), $reservedWords)) {
                $errorMessage = 'Akhiran link "' . $validated['back_half'] . '" tidak dapat digunakan karena sudah direserved sistem.';
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                        'errors' => ['back_half' => [$errorMessage]]
                    ], 422);
                }
                
                return redirect()->back()
                                ->withErrors(['back_half' => $errorMessage])
                                ->withInput();
            }

            $allRoutes = collect(Route::getRoutes())->map(function ($route) {
                return trim($route->uri(), '/');
            });

            if ($allRoutes->contains($validated['back_half'])) {
                $errorMessage = 'Akhiran link "' . $validated['back_half'] . '" tidak dapat digunakan karena sudah digunakan oleh sistem (route Laravel).';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                        'errors' => ['back_half' => [$errorMessage]]
                    ], 422);
                }

                return redirect()->back()
                                ->withErrors(['back_half' => $errorMessage])
                                ->withInput();
            }

            $openAt = new \DateTime($validated['open_at']);
            $endAt = new \DateTime($validated['end_at']);
            
            if ($endAt <= $openAt) {
                $errorMessage = 'Waktu berakhir harus setelah waktu mulai.';
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                        'errors' => ['end_at' => [$errorMessage]]
                    ], 422);
                }
                
                return redirect()->back()
                                ->withErrors(['end_at' => $errorMessage])
                                ->withInput();
            }

            // Buat shortlink baru
            $shortLink = ShortLink::create([
                'name' => $validated['name'],
                'back_half' => $validated['back_half'],
                'link' => $validated['link'],
                'open_at' => $validated['open_at'],
                'end_at' => $validated['end_at'],
                'count_visitors' => 0,
                'created_by' => 1
            ]);

            $successMessage = 'Link Shortener berhasil ditambahkan!';
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                    'shortlink' => $shortLink->load('created_by'),
                    'short_url' => url($shortLink->back_half)
                ], 201);
            }
            
            return redirect()->route('dashboard.shortener.index')
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

    public function visitShortLink($back_half)
    {
        $link = ShortLink::where('back_half', $back_half)->firstOrFail();

        $now = now();

        if ($link->open_at && $now->lt($link->open_at)) {
            return response()->view('shortlink.not_open', ['link' => $link], 403);
        }

        if ($link->end_at && $now->gt($link->end_at)) {
            return response()->view('shortlink.expired', ['link' => $link], 410);
        }

        $isGuest = Auth::check();

        if (!$isGuest) {
            $link->increment('count_visitors');

            if ($link->back_half === 'register') {
                broadcastParseValue();
            }
        }

        return Redirect::to($link->link);
    }

    public function update(Request $request, ShortLink $short_link)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'back_half' => [
                    'required',
                    'string',
                    'max:100',
                    'regex:/^[a-zA-Z0-9_-]+$/',
                    Rule::unique('short_links', 'back_half')->ignore($short_link->id),
                ],
                'link' => 'required|url|max:2000',
                'open_at' => 'required|date',
                'end_at' => 'required|date|after:open_at',
            ], [
                'name.required' => 'Nama shortener wajib diisi.',
                'name.string' => 'Nama shortener harus berupa teks.',
                'name.max' => 'Nama shortener maksimal 255 karakter.',

                'back_half.required' => 'Akhiran link wajib diisi.',
                'back_half.string' => 'Akhiran link harus berupa teks.',
                'back_half.max' => 'Akhiran link maksimal 100 karakter.',
                'back_half.regex' => 'Akhiran link hanya boleh mengandung huruf, angka, underscore, dan strip.',
                'back_half.unique' => 'Akhiran link sudah digunakan. Silakan pilih akhiran yang lain.',

                'link.required' => 'Link tujuan wajib diisi.',
                'link.url' => 'Link tujuan harus berupa URL yang valid.',
                'link.max' => 'Link tujuan maksimal 2000 karakter.',

                'open_at.required' => 'Waktu mulai wajib diisi.',
                'open_at.date' => 'Format waktu mulai tidak valid.',

                'end_at.required' => 'Waktu berakhir wajib diisi.',
                'end_at.date' => 'Format waktu berakhir tidak valid.',
                'end_at.after' => 'Waktu berakhir harus setelah waktu mulai.',
            ]);

            $reservedWords = [
                'admin', 'dashboard', 'api', 'www', 'mail', 'ftp', 'localhost', 
                'root', 'support', 'noreply', 'postmaster', 'hostmaster',
                'app', 'home', 'index', 'main', 'test', 'dev', 'staging'
            ];
            
            if (in_array(strtolower($validated['back_half']), $reservedWords)) {
                $errorMessage = 'Akhiran link "' . $validated['back_half'] . '" tidak dapat digunakan karena sudah direserved sistem.';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                        'errors' => ['back_half' => [$errorMessage]]
                    ], 422);
                }

                return redirect()->back()
                                ->withErrors(['back_half' => $errorMessage])
                                ->withInput();
            }

            $allRoutes = collect(Route::getRoutes())->map(function ($route) {
                return trim($route->uri(), '/');
            });

            if ($allRoutes->contains($validated['back_half'])) {
                $errorMessage = 'Akhiran link "' . $validated['back_half'] . '" tidak dapat digunakan karena sudah digunakan oleh sistem (route Laravel).';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                        'errors' => ['back_half' => [$errorMessage]]
                    ], 422);
                }

                return redirect()->back()
                                ->withErrors(['back_half' => $errorMessage])
                                ->withInput();
            }

            $openAt = new \DateTime($validated['open_at']);
            $endAt = new \DateTime($validated['end_at']);
            
            if ($endAt <= $openAt) {
                $errorMessage = 'Waktu berakhir harus setelah waktu mulai.';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                        'errors' => ['end_at' => [$errorMessage]]
                    ], 422);
                }

                return redirect()->back()
                                ->withErrors(['end_at' => $errorMessage])
                                ->withInput();
            }

            $protectedBackHalves = ['register', 'pre-test', 'post-test'];
            if (in_array(strtolower($short_link->back_half), $protectedBackHalves)) {
                $short_link->update([
                    'name' => $validated['name'],
                    'link' => $validated['link'],
                    'open_at' => $validated['open_at'],
                    'end_at' => $validated['end_at'],
                ]);
            } else {
                $short_link->update([
                    'name' => $validated['name'],
                    'back_half' => $validated['back_half'],
                    'link' => $validated['link'],
                    'open_at' => $validated['open_at'],
                    'end_at' => $validated['end_at'],
                ]);
            }

            $successMessage = 'Link Shortener berhasil diperbarui!';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                    'shortlink' => $short_link->fresh(),
                    'short_url' => url($short_link->back_half)
                ], 200);
            }

            return redirect()->route('dashboard.shortener.index')
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

    public function show(ShortLink $short_link, Request $request)
    {
        try {
            $short_link->load('created_by');
            
            $short_link->open_at_formatted = \Carbon\Carbon::parse($short_link->open_at)->format('d/m/Y, H:i');
            $short_link->end_at_formatted  = \Carbon\Carbon::parse($short_link->end_at)->format('d/m/Y, H:i');
            $short_link->access_link  = url($short_link->back_half);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => $short_link
                ]);
            }

            abort(404);
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Link shortener tidak ditemukan atau terjadi kesalahan'
                ], 404);
            }

            return redirect()
                ->route('dashboard.shortener.index')
                ->with('error', 'Link shortener tidak ditemukan');
        }
    }

    public function destroy(ShortLink $short_link) {
        $protectedBackHalves = ['register', 'pre-test', 'post-test'];

        if (in_array(strtolower($short_link->back_half), $protectedBackHalves)) {
            return response()->json([
                'success' => false,
                'message' => 'Link dengan akhiran "' . $short_link->back_half . '" tidak dapat dihapus.'
            ], 403);
        }

        $short_link->delete();

        broadcastParseValue();

        return response()->json([
                'success' => true,
                'message' => 'Link berhasil dihapus'
            ], 200);
    }

}
