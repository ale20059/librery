<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.custom');


Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::get('/', [BookController::class, 'grid'])->name('books.grid');
