<?php

use App\Livewire\Cart;
use App\Livewire\Login;
use App\Livewire\ProductView;
use App\Livewire\CategoryView;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/try', function () {
    return view('lite.app');
});

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/shop', ProductView::class)->name('products')->middleware('auth');
Route::get('/cart', Cart::class)->name('cart')->middleware('auth');
Route::get('/category/{id}', CategoryView::class)->name('category')->middleware('auth');
