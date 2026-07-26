<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Category;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::get('/', function () {
    return view('index');
})->name('index');


Route::middleware('auth')->group(function () {
    Route::get('/chatbot', function () {
        return view('chatbot');
    })->name('chatbot');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/katalog', function () {
    $categories = Category::with('products')->get();
    return view('katalog', compact('categories'));
})->name('katalog');

// Route Keranjang & Checkout (Wajib Login)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/checkout-whatsapp', [OrderController::class, 'checkoutWhatsApp'])->name('checkout.whatsapp');
});