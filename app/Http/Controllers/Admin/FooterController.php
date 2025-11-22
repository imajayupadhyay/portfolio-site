<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FooterController extends Controller
{
    public function index()
    {
        $settings = Setting::where('key', 'like', 'footer_%')->pluck('value', 'key');
        $socialLinks = SocialLink::where('context', 'footer')->orderBy('order')->get();

        return Inertia::render('Admin/Footer', [
            'user' => Auth::user(),
            'settings' => $settings,
            'socialLinks' => $socialLinks,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'footer_copyright' => 'nullable|string|max:255',
            'footer_email' => 'nullable|email|max:255',
            'footer_phone' => 'nullable|string|max:50',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
        }

        return back()->with('success', 'Footer updated successfully.');
    }

    public function storeSocialLink(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string',
            'color' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $validated['context'] = 'footer';
        $validated['order'] = SocialLink::where('context', 'footer')->max('order') + 1;

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
