<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\CertificationsController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\SkillsController;
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

        // Hero Section
        Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');
        Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');
        Route::post('/hero/upload-image', [HeroController::class, 'uploadImage'])->name('hero.upload-image');
        Route::post('/hero/upload-resume', [HeroController::class, 'uploadResume'])->name('hero.upload-resume');

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

        // Experience
        Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.index');
        Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');
        Route::put('/experience/{experience}', [ExperienceController::class, 'update'])->name('experience.update');
        Route::delete('/experience/{experience}', [ExperienceController::class, 'destroy'])->name('experience.destroy');
        Route::put('/experience-settings', [ExperienceController::class, 'updateSettings'])->name('experience.settings');

        // Footer
        Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
        Route::put('/footer', [FooterController::class, 'update'])->name('footer.update');
        Route::post('/footer/social', [FooterController::class, 'storeSocialLink'])->name('footer.social.store');
        Route::put('/footer/social/{socialLink}', [FooterController::class, 'updateSocialLink'])->name('footer.social.update');
        Route::delete('/footer/social/{socialLink}', [FooterController::class, 'destroySocialLink'])->name('footer.social.destroy');

        // Skills
        Route::get('/skills', [SkillsController::class, 'index'])->name('skills.index');
        Route::put('/skills-settings', [SkillsController::class, 'updateSettings'])->name('skills.settings');

        // Skill Categories
        Route::post('/skills/categories', [SkillsController::class, 'storeCategory'])->name('skills.categories.store');
        Route::put('/skills/categories/{category}', [SkillsController::class, 'updateCategory'])->name('skills.categories.update');
        Route::delete('/skills/categories/{category}', [SkillsController::class, 'destroyCategory'])->name('skills.categories.destroy');

        // Skills
        Route::post('/skills/items', [SkillsController::class, 'storeSkill'])->name('skills.items.store');
        Route::put('/skills/items/{skill}', [SkillsController::class, 'updateSkill'])->name('skills.items.update');
        Route::delete('/skills/items/{skill}', [SkillsController::class, 'destroySkill'])->name('skills.items.destroy');
    });
});
