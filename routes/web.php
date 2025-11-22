<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Models\Certification;
use App\Models\Experience;
use App\Models\Setting;
use App\Models\SkillCategory;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $certSettings = Setting::whereIn('key', [
        'certifications_badge',
        'certifications_heading',
        'certifications_description',
    ])->pluck('value', 'key');

    $heroSettings = Setting::where('key', 'like', 'hero_%')->pluck('value', 'key');
    $expSettings = Setting::where('key', 'like', 'experience_%')->pluck('value', 'key');
    $skillsSettings = Setting::where('key', 'like', 'skills_%')->pluck('value', 'key');

    $skillCategories = SkillCategory::with(['skills' => function ($query) {
        $query->active();
    }])->active()->get();

    return Inertia::render('Home', [
        'laravelVersion' => app()->version(),
        'certifications' => Certification::active()->orderBy('order')->get(),
        'certificationSettings' => $certSettings,
        'heroSettings' => $heroSettings,
        'experiences' => Experience::active()->orderBy('order')->get(),
        'experienceSettings' => $expSettings,
        'skillCategories' => $skillCategories,
        'skillsSettings' => $skillsSettings,
    ]);
});

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
