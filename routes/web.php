<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    // return view('welcome');
    return view('user');
});

Route::post('/Home', function () {
    return view('user');
});

Route::get('/search', [BookController::class, 'search']);
Route::get('/bookDetails/{olid}', [BookController::class, 'getBook']);

Route::get('/login', function () {
    // return view('welcome');
    return view('welcome');
});
