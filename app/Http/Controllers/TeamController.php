<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $title = "Dashboard Team - ";
        
        $query = Team::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('year', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('year') && !empty($request->year)) {
            $query->where('year', $request->year);
        }
        
        $sortBy = $request->get('sort_by', 'latest');
        switch ($sortBy) {
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'year':
                $query->orderBy('year', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->latest();
                break;
        }
        
        $teams = $query->paginate(10)->appends($request->query());
        return view('dashboard.team.index', compact('title', 'teams'));
    }

    public function create()  {
        $title = "Dashboard Create Team - ";
        return view('dashboard.team.create', compact('title'));
    }

    public function edit(Team $team)  {
        $team->load('contributors');
        $title = "Dashboard Create Team - ";
        return view('dashboard.team.edit', compact('title', 'team'));
    }


    public function store(Request $request) {
        try {
            $currentYear = now()->year;
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('teams', 'name')->where(function ($query) use ($request) {
                        return $query->where('year', $request->year);
                    }),
                ],
                'year' => [
                    'required',
                    'integer',
                    'min:2024',
                    'max:' . $currentYear,
                ],
                'contributors' => 'required|array|min:1',
                'contributors.*' => 'required|string|max:100',
            ], [
                'name.required' => 'Nama team wajib diisi.',
                'name.unique' => 'Nama team sudah ada untuk tahun ini.',
                'name.max' => 'Nama team maksimal 255 karakter.',
                'year.required' => 'Tahun wajib diisi.',
                'year.integer' => 'Tahun harus berupa angka.',
                'year.min' => 'Tahun minimal 2024.',
                'year.max' => 'Tahun maksimal ' . $currentYear . '.',
                'contributors.required' => 'Minimal harus ada 1 contributor.',
                'contributors.min' => 'Minimal harus ada 1 contributor.',
                'contributors.*.required' => 'Nama contributor wajib diisi.',
                'contributors.*.max' => 'Nama contributor maksimal 100 karakter.',
            ]);

            $result = DB::transaction(function () use ($validated) {
                $team = Team::create([
                    'name' => $validated["name"],
                    'year' => $validated["year"],
                ]);

                $contributors = [];
                foreach($validated["contributors"] as $name) {
                    $contributor = Contributor::create([
                        "name" => trim($name),
                        "team_id" => $team->id
                    ]);
                    $contributors[] = $contributor;
                }

                return [
                    'team' => $team,
                    'contributors' => $contributors
                ];
            });

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Team berhasil ditambahkan!',
                    'team' => $result['team'],
                    'contributors' => $result['contributors']
                ], 201);
            }

            return redirect()->route('dashboard.team.index')
                            ->with('success', 'Team berhasil ditambahkan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang dimasukkan tidak valid.',
                    'errors' => $e->errors()
                ], 422);
            }
            
            return redirect()->back()
                            ->withErrors($e->errors())
                            ->withInput();
                            
        } catch (\Throwable $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan sistem.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }
            
            return redirect()->back()
                            ->with('error', 'Terjadi kesalahan sistem.')
                            ->withInput();
        }
    }

    public function update(Request $request, Team $team) {
        try {
            $currentYear = now()->year;
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('teams', 'name')->where(function ($query) use ($request) {
                        return $query->where('year', $request->year);
                    })->ignore($team->id),
                ],
                'year' => [
                    'required',
                    'integer',
                    'min:2024',
                    'max:' . $currentYear,
                ],
                'contributors' => 'required|array|min:1',
                'contributors.*' => 'required|string|max:100',
            ], [
                'name.required' => 'Nama team wajib diisi.',
                'name.unique' => 'Nama team sudah ada untuk tahun ini.',
                'name.max' => 'Nama team maksimal 255 karakter.',
                'year.required' => 'Tahun wajib diisi.',
                'year.integer' => 'Tahun harus berupa angka.',
                'year.min' => 'Tahun minimal 2024.',
                'year.max' => 'Tahun maksimal ' . $currentYear . '.',
                'contributors.required' => 'Minimal harus ada 1 contributor.',
                'contributors.min' => 'Minimal harus ada 1 contributor.',
                'contributors.*.required' => 'Nama contributor wajib diisi.',
                'contributors.*.max' => 'Nama contributor maksimal 100 karakter.',
            ]);

            $result = DB::transaction(function () use ($validated, $team) {
                // Update team data
                $team->update([
                    'name' => $validated["name"],
                    'year' => $validated["year"],
                ]);

                // Delete existing contributors
                $team->contributors()->delete();

                // Create new contributors
                $contributors = [];
                foreach($validated["contributors"] as $name) {
                    $contributor = Contributor::create([
                        "name" => trim($name),
                        "team_id" => $team->id
                    ]);
                    $contributors[] = $contributor;
                }

                return [
                    'team' => $team->fresh(),
                    'contributors' => $contributors
                ];
            });

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Team berhasil diperbarui!',
                    'team' => $result['team'],
                    'contributors' => $result['contributors']
                ], 200);
            }

            return redirect()->route('dashboard.team.index')
                            ->with('success', 'Team berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang dimasukkan tidak valid.',
                    'errors' => $e->errors()
                ], 422);
            }
        
            return redirect()->back()
                            ->withErrors($e->errors())
                            ->withInput();
                        
        } catch (\Throwable $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan sistem.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }
        
            return redirect()->back()
                            ->with('error', 'Terjadi kesalahan sistem.')
                            ->withInput();
        }
    }

    public function show($id, Request $request)
    {
        try {
            $team = Team::with('contributors', 'showcase')->findOrFail($id);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => $team
                ]);
            }

            return view('dashboard.team.show', compact('team'));

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tim tidak ditemukan atau terjadi kesalahan'
                ], 404);
            }

            return redirect()
                ->route('dashboard.team.index')
                ->with('error', 'Tim tidak ditemukan');
        }
    }

    public function destroy(Team $team) {
        try {
            DB::transaction(function () use ($team) {
                if ($team->contributors()->exists()) {
                    $team->contributors()->delete();
                }

                $showcase = $team->showcase;
                if ($showcase) {
                    if ($showcase->cover && Storage::disk('public')->exists($showcase->cover)) {
                        Storage::disk('public')->delete($showcase->cover);
                    }
                    
                    $showcase->delete();
                }

                $team->delete();
            });

            return response()->json([
                'success' => true,
                'message' => 'Team dan semua data terkait berhasil dihapus!'
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Team tidak ditemukan.'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus team.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
