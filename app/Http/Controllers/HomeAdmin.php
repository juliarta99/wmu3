<?php

namespace App\Http\Controllers;

use App\Events\HomeAdminEvent;
use App\Models\ShortLink;
use App\Models\Showcase;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeAdmin extends Controller
{   
    public function updateData() {
        try {
            $year = now()->year;
            $webVisitor = Visitor::where('year', $year)->first();
            $regisLink = ShortLink::where('back_half', 'Link-Regis')->first();
        
            $data = [
                'webvisitorcount' => $webVisitor->count_visitor ?? 0,
                'regiscount' => $regisLink->count_visitors,
                'showcasecount' => Showcase::count(),
                'linkshortenercount' => ShortLink::count()
            ];
        
            // broadcast(new HomeAdminEvent($data))->toOthers();
            $event = new HomeAdminEvent($data);
            broadcast($event);
            
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
