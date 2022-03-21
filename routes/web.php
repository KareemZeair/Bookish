<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;


Route::get('/Home', [UserController::class, 'show'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/user/wishlist', [UserController::class, 'wishlist'])->middleware('auth');
Route::post('/user/pastreads', [UserController::class, 'pastreads'])->middleware('auth');

Route::get('/', [SessionController::class, 'create']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::get('/search', [BookController::class, 'search']);
Route::get('/book', [BookController::class, 'getBook']);

