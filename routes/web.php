<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'laravelVersion' => app()->version(),
    ]);
});

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
