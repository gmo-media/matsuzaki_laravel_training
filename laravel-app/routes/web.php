<?php

use App\Http\Livewire\OmikujiComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BaseballComponent;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/omikuji-view', OmikujiComponent::class);
Route::get('/omikuji', [OmikujiComponent::class, 'draw']);
Route::get('/omikuji/paid', [OmikujiComponent::class, 'drawPaid']);
Route::get('/baseball', BaseballComponent::class);
