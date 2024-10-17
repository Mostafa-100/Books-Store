<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/books/{book}', [BookController::class, 'show'])->whereNumber('book')->name('books.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->whereNumber('category')->name('categories.show');
Route::get('/search', SearchController::class)->name('search');
