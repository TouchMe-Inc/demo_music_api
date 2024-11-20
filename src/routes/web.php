<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('artists', ArtistController::class);
Route::apiResource('songs', SongController::class);
Route::apiResource('albums', AlbumController::class);
