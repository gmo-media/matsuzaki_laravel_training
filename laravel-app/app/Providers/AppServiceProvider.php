<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OmikujiInterface;
use App\Services\FortuneService;
use Livewire\Livewire;
use App\Services\BaseballService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OmikujiInterface::class, FortuneService::class);

        $this->app->singleton(BaseballService::class, function ($app) {
            return new BaseballService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('omikuji-component', \App\Http\Livewire\OmikujiComponent::class);
    }
}
