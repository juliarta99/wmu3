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
    public function addTeam(Request $request) {
        try {
            $currentYear = now()->year;

            $validated = $request->validate([
                'no_team' => [
                    'required',
                    'integer',
                    Rule::unique('teams')->where(function ($query) use ($currentYear) {
                        return $query->where('year', $currentYear);
                    }),
                ],
                'name' => 'required|array|min:1',
                'name.*' => 'required|string|max:100',
            ]);

            $team = Team::create([
                'no_team' => $validated["no_team"],
                'year' => now()->year,
            ]);

            $contributors = [];

            foreach($validated["name"] as $name) {
                $contributor = Contributor::create([
                    "name" => $name,
                    "team_id" => $team->id
                ]);

                array_push($contributors, $contributor);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan.',
                'team' => $team,
                'contributors' => $contributors
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function editTeam(Request $request, $team_id) {
        try {
            $currentYear = now()->year;

            $validated = $request->validate([
                'no_team' => [
                'sometimes',
                'integer',
                Rule::unique('teams', 'no_team')
                    ->ignore($team_id)
                    ->where(function ($query) use ($currentYear) {
                        return $query->where('year', $currentYear);
                    }),
            ],
                'name' => 'sometimes|array',
                'name.*' => 'required|string|max:100',
                'editcontributors' => 'sometimes|array',
                'editcontributors.*.id' => 'required|integer',
                'editcontributors.*.value' => 'required|string|max:100',
                'deletecontributors' => 'sometimes|array',
                'deletecontributors.*' => 'required|integer',
            ]);

            $team = Team::findOrFail($team_id);

            if (isset($validated["deletecontributors"]) &&
                $team->contributors()->count() === count($validated["deletecontributors"])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data contributor tidak dapat dihapus semua',
                ], 422);
            }

            $deleteIds = $validated['deletecontributors'] ?? [];

            foreach ($validated['editcontributors'] ?? [] as $edit) {
                if (in_array($edit['id'], $deleteIds)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'data tidak dapat dihapus dan diedit secara bersamaan',
                    ], 422);
                }
            }

            DB::beginTransaction();

            $team["no_team"] = array_key_exists("no_team", $validated)
                    ? $validated["no_team"] : $team->no_team;
            $team->save();

            $contributors = [];
            if (!empty($validated['name'])) {
                foreach ($validated['name'] as $name) {
                    $contributor = Contributor::create([
                        'name' => $name,
                        'team_id' => $team->id
                    ]);

                    array_push($contributors, $contributor);
                }
            } 

            if (!empty($validated["editcontributors"])) {
                foreach ($validated["editcontributors"] as $edit) {
                    $editContributor = Contributor::findOrFail($edit["id"]);

                    if ($editContributor->team_id !== $team->id) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Contributor tidak termasuk dalam team ini.',
                        ], 403);
                    }

                    $editContributor["name"] = $edit["value"];
                    $editContributor->save();
                }
            } 

            if (!empty($validated["deletecontributors"])) {
                foreach ($validated["deletecontributors"] as $id) {
                    $deleteContributor = Contributor::findOrFail($id);

                    if ($deleteContributor->team_id !== $team->id) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Contributor tidak termasuk dalam team ini.',
                        ], 403);
                    }

                    $deleteContributor->delete();
                }
            } 
            
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diedit.',
                'team' => Team::with('contributors')->find($team->id),
            ], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengedit data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function showTeam(Request $request) {
        $teams = Team::with(['contributors', 'showcases'])
            ->when($request->time, function ($query, $time) {
                if ($time == "terbaru") {
                    $query->orderBy('created_at', 'desc');
                } elseif ($time == "terlama") {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($request->year, function ($query, $year) {
                $query->where('year', $year);
            })
            ->paginate(10)
            ->withQueryString();

        // return view("dashboard-team", compact('teams'));

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil didapat.',
            'data' => $teams
        ], 200);
    }

    public function deleteTeam($team_id) {
        try {
            $team = Team::findOrFail($team_id);

            $contributors = $team->contributors()->get();
            $showcases = $team->showcases()->get();

            DB::beginTransaction();


            if ($contributors->count() > 0) {
                $team->contributors()->delete();
            }

            if ($showcases->count() > 0) {
                foreach ($showcases as $showcase) {
                    if ($showcase->cover && Storage::disk('public')->exists($showcase->cover)) {
                        Storage::disk('public')->delete($showcase->cover);
                    }
                }
                
                $team->showcases()->delete();
            }

            $teamData = $team->toArray();
            $team->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Team dan semua data terkait berhasil dihapus.',
                'deleted_data' => [
                    'team' => $teamData,
                    'contributors_count' => $contributors->count(),
                    'showcases_count' => $showcases->count()
                ]
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
        
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus team: ' . $e->getMessage(),
            ], 500);
        }
    }


}
