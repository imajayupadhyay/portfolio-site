<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Inertia\Inertia;

class CertificationsController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('key', [
            'certifications_badge',
            'certifications_heading',
            'certifications_description',
        ])->pluck('value', 'key');

        return Inertia::render('Admin/Certifications', [
            'user' => Auth::user(),
            'certifications' => Certification::orderBy('order')->get(),
            'settings' => $settings,
        ]);
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'certifications_badge' => 'nullable|string|max:255',
            'certifications_heading' => 'nullable|string|max:255',
            'certifications_description' => 'nullable|string|max:500',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255',
            'provider' => 'required|string|max:255',
            'badge_image' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url|max:255',
            'gradient_from' => 'nullable|string|max:20',
            'gradient_to' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = Certification::max('order') + 1;

        Certification::create($validated);

        return back()->with('success', 'Certification added successfully.');
    }

    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255',
            'provider' => 'required|string|max:255',
            'badge_image' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url|max:255',
            'gradient_from' => 'nullable|string|max:20',
            'gradient_to' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $certification->update($validated);

        return back()->with('success', 'Certification updated successfully.');
    }

    public function destroy(Certification $certification)
    {
        // Delete old image if exists
        if ($certification->badge_image && str_starts_with($certification->badge_image, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $certification->badge_image));
        }
        $certification->delete();
        return back()->with('success', 'Certification deleted successfully.');
    }

    public function uploadBadge(Request $request)
    {
        $request->validate([
            'badge' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        $path = $request->file('badge')->store('badges', 'public');

        return response()->json([
            'path' => '/storage/' . $path,
        ]);
    }
}
