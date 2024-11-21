<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumSongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::apiResource('artists', ArtistController::class);
Route::apiResource('songs', SongController::class);
Route::apiResource('albums', AlbumController::class);

Route::get('albums/{album}/songs', [AlbumSongController::class, 'index']);
Route::post('albums/{album}/songs', [AlbumSongController::class, 'store']);
Route::delete('albums/{album}/songs/{song}', [AlbumSongController::class, 'destroy']);
