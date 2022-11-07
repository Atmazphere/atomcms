<?php

namespace App\Providers;

use App\Services\RconService;
use App\Services\SettingsService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \Illuminate\Foundation\Vite::class,
            \App\Services\ViteService::class,
        );

        $this->app->bind(RconService::class, fn () => new RconService);

        $this->app->singleton(
            SettingsService::class,
            fn () => new SettingsService()
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('habbo.site.force_https')) {
            URL::forceScheme('https');
        }
    }
}
