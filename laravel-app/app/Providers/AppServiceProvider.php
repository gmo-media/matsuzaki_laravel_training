<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OmikujiInterface;
use App\Services\FortuneService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OmikujiInterface::class, FortuneService::class);

        $this->app->singleton('omikuji', function ($app) {
            return $app->make(OmikujiInterface::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
