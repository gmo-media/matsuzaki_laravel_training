<?php

use App\Http\Controllers\OmikujiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/omikuji-view', function () {return view('omikuji');});
Route::get('/omikuji', [OmikujiController::class, 'draw']);
Route::get('/omikuji/paid', [OmikujiController::class, 'drawPaid']);
