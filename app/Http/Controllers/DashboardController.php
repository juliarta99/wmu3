<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\Showcase;
use App\Models\Team;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard - ";
        $year = now()->year;
        $webVisitor = Visitor::where('year', $year)->first();
        $regisLink = ShortLink::where('back_half', 'register')->first();

        $webvisitorcount = $webVisitor->count_visitor ?? 0;
        $regiscount = $regisLink->count_visitors ?? 0;
        $teamcount = Team::count();
        $showcasecount = Showcase::count();
        $linkshortenercount = ShortLink::count();
        
        return view('dashboard.index', compact('title', 'webvisitorcount', 'regiscount', 'teamcount', 'showcasecount', 'linkshortenercount'));
    }
}
