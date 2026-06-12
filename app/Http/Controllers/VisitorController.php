<?php

namespace App\Http\Controllers;

use App\Models\VisitorTrack;

class VisitorController extends Controller
{
    public static function getStats()
    {
        return [

            'total_visitors' =>
            VisitorTrack::count(),

            'online_users' =>
            VisitorTrack::where(
                'last_activity',
                '>=',
                now()->subMinutes(1)
            )->count(),

            'last_5_minutes' =>
            VisitorTrack::where(
                'last_activity',
                '>=',
                now()->subMinutes(5)
            )->count(),

            'today_visitors' =>
            VisitorTrack::whereDate(
                'created_at',
                today()
            )->count(),

        ];
    }
}
