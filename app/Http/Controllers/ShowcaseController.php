<?php

namespace App\Http\Controllers;

use App\Models\Showcase;
use App\Models\Contributor;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ShowcaseController extends Controller
{
    public function showShowcase(Request $request) {
        $showcases = Showcase::with(['team', 'team.contributors'])
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%' );
            })
            ->when($request->time, function ($query, $time) {
                if ($time == "terbaru") {
                    $query->orderBy('created_at', 'desc');
                } elseif ($time == "terlama") {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($request->year, function ($query, $year) {
                $query->whereYear('created_at', $year);
            })
            ->paginate(10)
            ->withQueryString();

        // return view("dashboard-showcaseadmin", compact('showcases'));

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil didapat.',
            'data' => $showcases
        ], 200);
    }

    public function addShowcase(Request $request) {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:100',
                'cover' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'team_id' => 'required|integer|exists:teams,id',
                'description' => 'required|string',
                'champion' => 'nullable|in:1,2,3',
                'link' => 'required|url',
            ]);

            $data = [
                'title' => $validated['title'],
                'description' => $validated['description'],
                'champion' => $validated['champion'] ?? null,
                'team_id' => $validated['team_id']
            ];

            $ytid = extractYoutubeId($validated["link"]);
            if (!$ytid) {
                return response()->json([
                    'success' => false,
                    'message' => 'Link YouTube tidak valid.',
                ], 422);
            }

            $data["youtube_id"] = $ytid;
            $data["cover"] = fileUpload($request->file('cover'), 'covers');
            $data["slug"] = Str::slug($validated['title']);

            $showcase = Showcase::create($data);

            broadcastParseValue();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan.',
                'showcases' => $showcase,
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function editShowcase(Request $request, $showcase_id){
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'title' => 'sometimes|string|max:100',
                'cover' => 'sometimes|file|mimes:jpg,jpeg,png|max:2048',
                'description' => 'sometimes|string',
                'champion' => 'sometimes|nullable|in:1,2,3',
                'link' => 'sometimes|url',
            ]);

            $showcase = Showcase::findOrFail($showcase_id);

            $dataShowcase = [
                'title' => $validated['title'] ?? $showcase->title,
                'description' => $validated['description'] ?? $showcase->description,
                'champion' => array_key_exists('champion', $validated)
                    ? $validated['champion']
                    : $showcase->champion,
                'slug' => Str::slug($validated['title'] ?? $showcase->title),
            ];

            if ($request->hasFile('cover')) {
                $dataShowcase['cover'] = fileUpload($request->file('cover'), 'covers');
            } else {
                $dataShowcase['cover'] = $showcase->cover;
            }

            if (isset($validated['link'])) {
                $youtubeId = extractYoutubeId($validated['link']);
                if (!$youtubeId) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Link YouTube tidak valid.',
                    ], 422);
                }
                $dataShowcase['youtube_id'] = $youtubeId;
            } else {
                $dataShowcase['youtube_id'] = $showcase->youtube_id;
            }

            $showcase->update($dataShowcase);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data showcase berhasil diperbarui',
                'showcase' => $showcase,
            ], 200);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteShowcase($showcase_id) {
        $showcase = Showcase::findOrFail($showcase_id);
        $showcase->delete();

        broadcastParseValue();

        return response()->json([
                'success' => true,
                'message' => 'Data showcase berhasil dihapus',
                'showcase' => $showcase,
            ], 200);
    }
}
