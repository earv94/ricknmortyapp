<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RickAndMortyController;

Route::get('/', [RickAndMortyController::class, 'index']);
Route::get('/rickandmorty', [RickAndMortyController::class, 'index']);
Route::post('/rickandmorty/save', [RickAndMortyController::class, 'save'])->name('rick.save');
Route::get('/rickandmorty/db', [RickAndMortyController::class, 'fromDatabase'])->name('rick.db');
Route::get('/rickandmorty/edit/{id}', [RickAndMortyController::class, 'edit']);
Route::post('/rickandmorty/update/{id}', [RickAndMortyController::class, 'update'])->name('rick.update');