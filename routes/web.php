<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

Route::get('/', HomeController::class)->name('home');
Route::get('movies/{id}', [MovieController::class, 'show'])->name('movies.show');
