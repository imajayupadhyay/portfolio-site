<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MessagesController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Authenticated routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Messages
        Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
        Route::get('/messages/{contact}', [MessagesController::class, 'show'])->name('messages.show');
        Route::patch('/messages/{contact}/read', [MessagesController::class, 'markAsRead'])->name('messages.read');
        Route::patch('/messages/{contact}/unread', [MessagesController::class, 'markAsUnread'])->name('messages.unread');
        Route::delete('/messages/{contact}', [MessagesController::class, 'destroy'])->name('messages.destroy');
    });
});
