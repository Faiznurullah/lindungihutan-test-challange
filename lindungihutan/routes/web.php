<?php

use App\Http\Controllers\ArtisController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProduserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArtisController::class, 'index'])->name('artis.index');
Route::put('/artis/{id}', [ArtisController::class, 'update']);
Route::delete('/artis/{id}', [ArtisController::class, 'destroy']); 
Route::get('/getDataByFilterArtis/{filterValue}', [ArtisController::class, 'getDataByFilter'])->name('artis.getDataByFilter');
Route::resource('/artis', ArtisController::class);


Route::get('/getDataByFilterFilm/{filterValue}', [FilmController::class, 'getDataByFilter'])->name('film.getDataByFilter');
Route::put('/film/{id}', [FilmController::class, 'update']);
Route::delete('/film/{id}', [FilmController::class, 'destroy']);
Route::resource('/film', FilmController::class);

Route::put('/genre/{id}', [GenreController::class, 'update']);
Route::delete('/genre/{id}', [GenreController::class, 'destroy']);
Route::resource('/genre', GenreController::class);


Route::put('/produser/{id}', [ProduserController::class, 'update']);
Route::delete('/produser/{id}', [ProduserController::class, 'destroy']);
Route::resource('/produser', ProduserController::class);


Route::put('/country/{id}', [CountryController::class, 'update']);
Route::delete('/country/{id}', [CountryController::class, 'destroy']);
Route::resource('/country', CountryController::class);

