<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('user.welcome');
})->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthenticateController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'store'])->name('login.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/transaction', [DashboardController::class, 'viewTransaction'])->name('dashboard.viewTransaction');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::put('/customer/{user}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{user}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::resource('categories', CategoryController::class);
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::resource('sales', SaleController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/add-to-cart/{book}', [CartController::class, 'addToCart'])->name('cart.store');
    Route::delete('/delete/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('dashboard.logout');
    Route::post('/checkout/{book}', [SaleController::class, 'buyNow'])->name('sale.buyNow');
    Route::post('/checkout', [SaleController::class, 'buyCart'])->name('sale.buyCart');
    // Route::resource('books', BookController::class);
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
});


