<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HeaderController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::where('context', 'header')->orderBy('order')->get();

        return Inertia::render('Admin/Header', [
            'user' => Auth::user(),
            'socialLinks' => $socialLinks,
        ]);
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

        $validated['context'] = 'header';
        $validated['order'] = SocialLink::where('context', 'header')->max('order') + 1;

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
            'order' => 'nullable|integer',
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
