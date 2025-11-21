<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Models\Certification;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $certSettings = Setting::whereIn('key', [
        'certifications_badge',
        'certifications_heading',
        'certifications_description',
    ])->pluck('value', 'key');

    return Inertia::render('Home', [
        'laravelVersion' => app()->version(),
        'certifications' => Certification::active()->orderBy('order')->get(),
        'certificationSettings' => $certSettings,
    ]);
});

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
