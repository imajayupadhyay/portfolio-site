<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SettingsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Settings', [
            'user' => Auth::user(),
            'settings' => Setting::where('group', 'contact')->orderBy('order')->get(),
            'socialLinks' => SocialLink::orderBy('order')->get(),
        ]);
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $setting) {
            Setting::where('key', $setting['key'])->update(['value' => $setting['value']]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }

    public function storeSocialLink(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string',
            'color' => 'nullable|string|max:20',
            'bg_class' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = SocialLink::max('order') + 1;

        SocialLink::create($validated);

        return back()->with('success', 'Social link added successfully.');
    }

    public function updateSocialLink(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string',
            'color' => 'nullable|string|max:20',
            'bg_class' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $socialLink->update($validated);

        return back()->with('success', 'Social link updated successfully.');
    }

    public function destroySocialLink(SocialLink $socialLink)
    {
        $socialLink->delete();
        return back()->with('success', 'Social link deleted successfully.');
    }
}
