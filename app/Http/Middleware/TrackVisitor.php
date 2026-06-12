<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorTrack;
class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        VisitorTrack::updateOrCreate(
            [
                'session_id' => session()->getId()
            ],
            [
                'user_id'       => auth()->id(),
                'ip_address'    => $request->ip(),
                'user_agent'    => $request->userAgent(),
                'url'           => $request->fullUrl(),
                'last_activity' => now(),
            ]
        );

        return $next($request);
    }
}
