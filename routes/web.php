<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)
  ->name('home');
Route::get('/books/{book}', [BookController::class, 'show'])
  ->whereNumber('book')
  ->name('books.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])
  ->whereNumber('category')
  ->name('categories.show');
Route::get('/search', SearchController::class)
  ->name('search');

Route::get('/login', [AuthController::class, 'showLoginForm'])
  ->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm'])
  ->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])
  ->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])
  ->name('authenticate');

Route::get('/profile', [UserController::class, 'show'])->name('users.show')
  ->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'forgotPasswordRequest'])
  ->middleware('guest')
  ->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordResponse'])
  ->middleware('guest')
  ->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->middleware('guest')
  ->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
  ->middleware('guest')
  ->name('password.update');
