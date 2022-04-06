<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TempBookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ReviewController;


Route::get('/Home', [UserController::class, 'show'])->middleware('auth');
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
Route::get('/user/edit', [UserController::class, 'edit'])->middleware('auth');
Route::post('/user/edit', [UserController::class, 'update'])->middleware('auth');

Route::delete('/user/wishlist/{key}',  [UserController::class, 'wishlist_delete'])->middleware('auth');
Route::post('/user/wishlist', [UserController::class, 'wishlist'])->middleware('auth');

Route::delete('/user/pastreads/{key}',  [UserController::class, 'pastreads_delete'])->middleware('auth');
Route::post('/user/pastreads', [UserController::class, 'pastreads'])->middleware('auth');

Route::post('/user/fav_book', [UserController::class, 'make_favourite'])->middleware('auth');
//delete favourite book?

Route::get('/listing/create',  [ListingController::class, 'create']);
Route::get('/user/{user:username}', [UserController::class, 'getUser']);

Route::get('/', [SessionController::class, 'create']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/search', [TempBookController::class, 'search']);
Route::get('/book/external', function () {
    return redirect('/');
});
Route::post('/book/external', [TempBookController::class, 'fetch']);

Route::get('/book/{key}',  [BookController::class, 'show']);
Route::post('/book/{book:key}/review',  [ReviewController::class, 'store']);
