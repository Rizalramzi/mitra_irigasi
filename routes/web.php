<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('app');
});

Route::post('/api/chat', [ChatController::class, 'send']);
