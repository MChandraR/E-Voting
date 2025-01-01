<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::share('apiRoute',  env('API_ROUTE', '/api'));
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('apiRoute',  env('API_ROUTE', '/api'));
    }
}
