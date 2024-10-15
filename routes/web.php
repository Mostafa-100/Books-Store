<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('/book/{id}', [BookController::class, 'show'])->whereNumber('id');
