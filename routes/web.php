<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', function () {
    return view('book/book');
});

Route::get('book/detail/{id}', function ($id) {
    return view('book/detail', ['id' => $id]);
});

Route::get('cart', function () {
    return view('cart/cart');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

Route::get('/dashboard/customers', function () {
    return view('dashboard/customer');
});

Route::get('/dashboard/transaction', function () {
    return view('dashboard/transaction');
});
