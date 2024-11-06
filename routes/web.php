<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('register', [AuthController::class, 'showRegisterForm'])
  ->name('register');

Route::post('/register', [AuthController::class, 'guestRegister'])
  ->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])
  ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
  ->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'forgotPasswordRequest'])
  ->middleware('guest')
  ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'forgotPasswordResponse'])
  ->middleware('guest')
  ->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])
  ->middleware('guest')
  ->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
  ->middleware('guest')
  ->name('password.update');

Route::get('/profile', [UserController::class, 'show'])->name('users.show')
  ->middleware('auth');
Route::get('/profile/edit', [UserController::class, 'edit'])
  ->name('users.edit')
  ->middleware('auth');
Route::post('/profile/update', [UserController::class, 'update'])
  ->name('users.update')
  ->middleware('auth');

Route::get('/verify', [EmailVerificationController::class, 'sendEmailVerification'])
  ->name('email.sendEmailVerify');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
  ->middleware(['auth', 'signed'])
  ->name('verification.verify');

// Route::get('/test', function () {
//   dd(auth()->user()->username);
// });
