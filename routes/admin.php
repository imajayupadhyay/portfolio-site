<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\CertificationsController;
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

        // Contact Page Settings
        Route::get('/contact', [SettingsController::class, 'index'])->name('contact.index');
        Route::put('/contact', [SettingsController::class, 'updateSettings'])->name('contact.update');
        Route::post('/contact/social', [SettingsController::class, 'storeSocialLink'])->name('contact.social.store');
        Route::put('/contact/social/{socialLink}', [SettingsController::class, 'updateSocialLink'])->name('contact.social.update');
        Route::delete('/contact/social/{socialLink}', [SettingsController::class, 'destroySocialLink'])->name('contact.social.destroy');

        // Projects
        Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
        Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
        Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
        Route::put('/projects-settings', [ProjectsController::class, 'updateSettings'])->name('projects.settings');

        // Certifications
        Route::get('/certifications', [CertificationsController::class, 'index'])->name('certifications.index');
        Route::post('/certifications', [CertificationsController::class, 'store'])->name('certifications.store');
        Route::put('/certifications/{certification}', [CertificationsController::class, 'update'])->name('certifications.update');
        Route::delete('/certifications/{certification}', [CertificationsController::class, 'destroy'])->name('certifications.destroy');
        Route::post('/certifications/upload-badge', [CertificationsController::class, 'uploadBadge'])->name('certifications.upload');
        Route::put('/certifications-settings', [CertificationsController::class, 'updateSettings'])->name('certifications.settings');
    });
});
