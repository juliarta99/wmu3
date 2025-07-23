<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShortLinkController extends Controller
{
    public function addShortLink(Request $request) {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:50',
                'link' => 'required|string|url',
                'back_half' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/^[a-zA-Z0-9_-]+$/',
                    'unique:short_links,back_half',
                ],
                'open_at' => 'required|date',
                'end_at' => 'required|date|after:open_at',
            ]);

            
            //pakai nanti klo dah ada data admin
            // $user = Auth::user();
            // $validated['created_by'] = $user->id;

            $validated['count_visitor'] = 0;
            //hapus code dibawah kalo dah ada data admin
            $validated['created_by'] = 1;

            ShortLink::create($validated);

            broadcastParseValue();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan.',
                'data' => $validated
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function visitShortLink(Request $request, $back_half) {
        $link = ShortLink::where('back_half', $back_half)->first();

        if (!$link) {
            abort(404);
        }

        $admin = Auth::user() && Auth::user()->role == true;

        if (!$admin) {
            $link->count_visitors += 1;
            $link->save();
            //tergantung nama backhalf register nanti, bisa ganti pakai env juga
            if ($link->back_half === 'Link-Regis') {
                broadcastParseValue();
            }
        }


        return Redirect::to($link->link);
    }

    public function showShortLinkForAdmin(Request $request) {
        //belum selesai ni, masih ditanyakan filter berdasarkan apa aja 
        $links = ShortLink::with('created_by')
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('link', 'like', '%' . $search . '%' )
                    ->orWhere('back_half', 'like', '%' . $search . '%' );
            })
            ->when($request->time, function ($query, $time) {
                if ($time == "terbaru") {
                    $query->orderBy('created_at', 'desc');
                } elseif ($time == "terlama") {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($request->count_visitor, function ($query, $count_visitor) {
                if ($count_visitor == "terbanyak") {
                    $query->orderBy('count_visitor', 'desc');
                } elseif ($count_visitor == "tersedikit") {
                    $query->orderBy('count_visitor', 'asc');
                }
            })
            ->paginate(10)
            ->withQueryString();

        // return view("dashboard-shortlink", compact('links'));

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil didapat.',
            'data' => $links
        ], 200);
    }

    public function showShortLink(Request $request) {

        $tanggalAkses = now()->toDateString();
        //belum selesai ni, masih ditanyakan filter berdasarkan apa aja 
        $links = ShortLink::with('created_by')
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('link', 'like', '%' . $search . '%' )
                    ->orWhere('back_half', 'like', '%' . $search . '%' );
            })
            ->when($request->time, function ($query, $time) {
                if ($time == "terbaru") {
                    $query->orderBy('created_at', 'desc');
                } elseif ($time == "terlama") {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($request->count_visitor, function ($query, $count_visitor) {
                if ($count_visitor == "terbanyak") {
                    $query->orderBy('count_visitor', 'desc');
                } elseif ($count_visitor == "tersedikit") {
                    $query->orderBy('count_visitor', 'asc');
                }
            })
            ->whereDate('open_at', '<=', $tanggalAkses)
            ->whereDate('end_at', '>=', $tanggalAkses)
            ->paginate(10)
            ->withQueryString();

        // return view("dashboard-shortlink", compact('links'));
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil didapat.',
            'data' => $links
        ], 200);
    }

    public function editShortLink(Request $request, $shortlink_id) {
        try {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:50',
                'link' => 'sometimes|string|url',
                'back_half' => [
                    'sometimes',
                    'string',
                    'max:50',
                    'regex:/^[a-zA-Z0-9_-]+$/',
                    Rule::unique('short_links', 'back_half')->ignore($shortlink_id),
                ],
                'open_at' => 'sometimes|date',
                'end_at' => 'sometimes|date|after:open_at',
            ]);

            $shortlink = ShortLink::findOrFail($shortlink_id);

            $newData = [
                'title' => $validated['title'] ?? $shortlink->title,
                'link' => $validated['link'] ?? $shortlink->link,
                'back_half' => $validated['back_half'] ?? $shortlink->back_half,
                'open_at' => $validated['open_at'] ?? $shortlink->open_at,
                'end_at' => $validated['end_at'] ?? $shortlink->end_at,
            ];

            $shortlink->update($newData);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate',
                'data' => $shortlink
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteShortLink($shortlink_id) {
        $shortlink = ShortLink::findOrFail($shortlink_id);
        $shortlink->delete();

        broadcastParseValue();

        return response()->json([
                'success' => true,
                'message' => 'Data shortlink berhasil dihapus',
                'shortlink' => $shortlink,
            ], 200);
    }

}
