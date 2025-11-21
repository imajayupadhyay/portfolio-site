<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FooterController extends Controller
{
    public function index()
    {
        $settings = Setting::where('key', 'like', 'footer_%')->pluck('value', 'key');

        return Inertia::render('Admin/Footer', [
            'user' => Auth::user(),
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'footer_copyright' => 'nullable|string|max:255',
            'footer_linkedin' => 'nullable|url|max:255',
            'footer_github' => 'nullable|url|max:255',
            'footer_email' => 'nullable|email|max:255',
            'footer_phone' => 'nullable|string|max:50',
            'footer_twitter' => 'nullable|url|max:255',
            'footer_instagram' => 'nullable|url|max:255',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
        }

        return back()->with('success', 'Footer updated successfully.');
    }
}
