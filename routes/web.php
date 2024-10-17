<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('/books/{book}', [BookController::class, 'show'])->whereNumber('book')->name('books.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->whereNumber('category')->name('categories.show');
