<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Fix for mixed content issue when running in HTTPS
        if (
            $this->app->environment("production") ||
            $this->app->environment("staging")
        ) {
            URL::forceScheme("https");
        }
    }
}
