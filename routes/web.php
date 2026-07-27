<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use Illuminate\Http\Request;

// 1. Guest Routes (Hanya untuk pengguna yang BELUM login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    // Profil User
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // ... route auth lainnya ...
});

// 2. Public Routes (Bisa diakses Publik)
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/chatbot', function () {
    return view('chatbot');
})->name('chatbot');

Route::get('/katalog', function () {
    $categories = Category::with('products')->get();
    return view('katalog', compact('categories'));
})->name('katalog');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// 3. API Endpoint Chatbot
// Route::post('/api/chat', function (Request $request) {
//     $messages = $request->input('messages', []);
//     $userQuery = end($messages)['text'] ?? '';

//     $reply = "Terima kasih sudah bertanya tentang **" . e($userQuery) . "**! Peralatan irigasi CV. Wijaya Karya dirancang khusus untuk efisiensi air lahan. Anda juga dapat berkonsultasi mengenai spesifikasi & penawaran harga via WhatsApp Admin di **0821-4201-0020**.";

//     return response()->json([
//         'reply' => $reply
//     ]);
// });

// 4. Protected Routes (Wajib Login)
Route::middleware('auth')->group(function () {
    // Route Logout User <--- TAMBAHKAN ATAU PASTIKAN INI ADA
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route Keranjang & Checkout
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/checkout-whatsapp', [OrderController::class, 'checkoutWhatsApp'])->name('checkout.whatsapp');
});