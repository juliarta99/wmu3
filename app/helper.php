<?php

use App\Models\Visitor;
use App\Models\Showcase;
use App\Models\ShortLink;
use App\Events\HomeAdminEvent;
use Illuminate\Support\Facades\Storage;

function fileUpload($file, $folder) {
    $newName = now()->format('Y-m-d') . '_' . $file->hashName();
    $path = Storage::disk('public')->putFileAs($folder,$file, $newName);
    return $path;
}


// function extractYoutubeId($url) {
//     preg_match(
//         '/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
//         $url,
//         $matches
//     );
//     return $matches[1] ?? null;
// }

function broadcastParseValue() {
    $year = now()->year;
    $webVisitor = Visitor::where('year', $year)->first();
    $regisLink = ShortLink::where('back_half', 'register')->first();

    $data = [
        'webvisitorcount' => $webVisitor->count_visitor ?? 0,
        'regiscount' => $regisLink->count_visitors ?? 0,
        'showcasecount' => Showcase::count(),
        'linkshortenercount' => ShortLink::count()
    ];

    // broadcast(new HomeAdminEvent($data))->toOthers();
    $event = new HomeAdminEvent($data);
    broadcast($event);
    
}