<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Cookie::has('visitor_tracked')) {
            $year = now()->year;

            $visitor = Visitor::where('year', $year)->first();
            if ($visitor) {
                $visitor->count_visitors += 1;
                $visitor->save();

                broadcastParseValue();
            } else {
                Visitor::create([
                    'year' => $year,
                    'count_visitors' => 1
                ]);
            }

            Cookie::queue('visitor_tracked', true, 60);
        }

        return $next($request);
    }
}
