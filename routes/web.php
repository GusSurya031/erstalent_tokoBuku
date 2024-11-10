<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [AuthenticateController::class, 'index'])->name('login');
Route::post('/login', [AuthenticateController::class, 'store'])->name('login.store');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/product', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('dashboard.logout');
    Route::get('/book', function () {
        return view('book/book');
    });
});

Route::get('book/detail/{id}', function ($id) {
    return view('book/detail', ['id' => $id]);
});

Route::get('cart', function () {
    return view('cart/cart');
});

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);

Route::resource('sales', SaleController::class);

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

Route::get('/dashboard/customers', function () {
    return view('dashboard/customer');
});

Route::get('/dashboard/transaction', function () {
    return view('dashboard/transaction');
});
