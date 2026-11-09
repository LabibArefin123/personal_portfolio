<?php

namespace App\Providers;

use App\Models\Organization;
use App\Models\VisitorTrack;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        app('router')->aliasMiddleware(
            'permission',
            \App\Http\Middleware\CheckPermission::class
        );

        // Use Bootstrap pagination views
        Paginator::useBootstrap();

        View::composer('*', function ($view) {

            $adminIps = array_filter(
                array_map('trim', explode(',', env('ADMIN_IPS', '')))
            );

            $view->with('visitorStats', [
                'total_visitors' => VisitorTrack::count(),

                'online_users' => VisitorTrack::where(
                    'last_activity',
                    '>=',
                    now()->subMinute()
                )->count(),

                'last_5_minutes' => VisitorTrack::where(
                    'last_activity',
                    '>=',
                    now()->subMinutes(5)
                )->count(),
            ]);

            $view->with(
                'showAnalytics',
                in_array(request()->ip(), $adminIps, true)
            );
        });
    }
}
