<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        Str::macro('html', function ($string) {
            return new HtmlString($string);
        });

        View::composer('*', function ($view) {
            $notifications = [];
            if (Auth::check()) {
                $notifications = Auth::user()->unreadNotifications;
            }
            $view->with('notifications', $notifications);
        });
    }
}
