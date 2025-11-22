<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Models\Certification;
use App\Models\Experience;
use App\Models\Setting;
use App\Models\SkillCategory;
use App\Models\BlogPost;
use App\Models\BlogCategory;
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
    $footerSettings = Setting::where('key', 'like', 'footer_%')->pluck('value', 'key');

    $skillCategories = SkillCategory::with(['skills' => function ($query) {
        $query->active();
    }])->active()->get();

    $footerSocialLinks = \App\Models\SocialLink::where('context', 'footer')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();

    return Inertia::render('Home', [
        'laravelVersion' => app()->version(),
        'certifications' => Certification::active()->orderBy('order')->get(),
        'certificationSettings' => $certSettings,
        'heroSettings' => $heroSettings,
        'experiences' => Experience::active()->orderBy('order')->get(),
        'experienceSettings' => $expSettings,
        'skillCategories' => $skillCategories,
        'skillsSettings' => $skillsSettings,
        'footerSettings' => $footerSettings,
        'footerSocialLinks' => $footerSocialLinks,
    ]);
});

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/blog', function () {
    $footerSettings = Setting::where('key', 'like', 'footer_%')->pluck('value', 'key');
    $footerSocialLinks = \App\Models\SocialLink::where('context', 'footer')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();

    // Get all active and published blog posts with their categories
    $posts = BlogPost::with('category')
        ->active()
        ->published()
        ->orderBy('order')
        ->orderBy('published_at', 'desc')
        ->get();

    // Get the featured post (first featured and published post)
    $featuredPost = BlogPost::with('category')
        ->active()
        ->published()
        ->featured()
        ->orderBy('published_at', 'desc')
        ->first();

    // Get active categories for the filter
    $categories = BlogCategory::active()->get();

    return Inertia::render('Blog/Index', [
        'posts' => $posts,
        'featuredPost' => $featuredPost,
        'categories' => $categories,
        'footerSettings' => $footerSettings,
        'footerSocialLinks' => $footerSocialLinks,
    ]);
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    $footerSettings = Setting::where('key', 'like', 'footer_%')->pluck('value', 'key');
    $footerSocialLinks = \App\Models\SocialLink::where('context', 'footer')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();

    // Get the blog post by slug with its category
    $post = BlogPost::with('category')
        ->where('slug', $slug)
        ->active()
        ->published()
        ->firstOrFail();

    // Increment view count
    $post->incrementViews();

    // Get related posts from the same category (excluding the current post)
    $relatedPosts = BlogPost::with('category')
        ->where('blog_category_id', $post->blog_category_id)
        ->where('id', '!=', $post->id)
        ->active()
        ->published()
        ->orderBy('published_at', 'desc')
        ->limit(3)
        ->get();

    return Inertia::render('Blog/Show', [
        'post' => $post,
        'relatedPosts' => $relatedPosts,
        'footerSettings' => $footerSettings,
        'footerSocialLinks' => $footerSocialLinks,
    ]);
})->name('blog.show');

// Catch-all route for 404 - Must be last!
Route::fallback(function () {
    return Inertia::render('Errors/404');
});
