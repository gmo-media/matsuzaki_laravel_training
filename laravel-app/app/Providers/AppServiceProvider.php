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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
