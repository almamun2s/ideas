<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        $topUsers = Cache::remember('topUsers', now()->addMinutes(5) , function () {
            return User::withCount('followers')
                ->orderBy('followers_count', 'DESC')
                ->limit(3)
                ->get();
        });

        // // To clear cache
        // Cache::flush();

        // // To clear specific cache
        // Cache::forget('topUsers');
        
        // // To clear specific cache
        // cache()->forget('topUsers');

        View::share('topUsers', $topUsers);
    }
}
