<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HeroController extends Controller
{
    public function index()
    {
        $settings = Setting::where('key', 'like', 'hero_%')->pluck('value', 'key');

        return Inertia::render('Admin/Hero', [
            'user' => Auth::user(),
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_greeting' => 'nullable|string|max:100',
            'hero_name' => 'nullable|string|max:255',
            'hero_roles' => 'nullable|string',
            'hero_description' => 'nullable|string|max:1000',
            'hero_stat1_value' => 'nullable|string|max:50',
            'hero_stat1_label' => 'nullable|string|max:100',
            'hero_stat2_value' => 'nullable|string|max:50',
            'hero_stat2_label' => 'nullable|string|max:100',
            'hero_stat3_value' => 'nullable|string|max:50',
            'hero_stat3_label' => 'nullable|string|max:100',
            'hero_cta1_text' => 'nullable|string|max:100',
            'hero_cta1_url' => 'nullable|string|max:255',
            'hero_cta2_text' => 'nullable|string|max:100',
            'hero_resume' => 'nullable|string|max:255',
            'hero_profile_image' => 'nullable|string|max:255',
            'hero_badge1_title' => 'nullable|string|max:100',
            'hero_badge1_subtitle' => 'nullable|string|max:100',
            'hero_badge2_title' => 'nullable|string|max:100',
            'hero_badge2_subtitle' => 'nullable|string|max:100',
            'hero_badge3_title' => 'nullable|string|max:100',
            'hero_badge3_subtitle' => 'nullable|string|max:100',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Hero section updated successfully.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5120',
        ]);

        $path = $request->file('image')->store('hero', 'public');

        return response()->json([
            'path' => '/storage/' . $path,
        ]);
    }

    public function uploadResume(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf|max:10240',
        ]);

        $path = $request->file('resume')->store('resumes', 'public');

        return response()->json([
            'path' => '/storage/' . $path,
        ]);
    }
}
