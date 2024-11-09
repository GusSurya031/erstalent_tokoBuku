<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [AuthenticateController::class, 'index'])->name('login');
Route::post('/login', [AuthenticateController::class, 'store'])->name('login.store');


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/product', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('dashboard.logout');
});

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
