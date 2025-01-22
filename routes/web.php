<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/genres', [IndexController::class, 'getGenres']);
Route::post('/search', [IndexController::class, 'searchGames']);