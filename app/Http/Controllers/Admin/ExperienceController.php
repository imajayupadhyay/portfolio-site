<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ExperienceController extends Controller
{
    public function index()
    {
        $settings = Setting::where('key', 'like', 'experience_%')->pluck('value', 'key');

        return Inertia::render('Admin/Experience', [
            'user' => Auth::user(),
            'experiences' => Experience::orderBy('order')->get(),
            'settings' => $settings,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|string|max:50',
            'end_date' => 'nullable|string|max:50',
            'is_current' => 'boolean',
            'duration_badge' => 'nullable|string|max:100',
            'achievements' => 'nullable|array',
            'icon_type' => 'nullable|string|max:50',
            'gradient_from' => 'nullable|string|max:20',
            'gradient_to' => 'nullable|string|max:20',
            'accent_color' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = Experience::max('order') + 1;

        Experience::create($validated);

        return back()->with('success', 'Experience added successfully.');
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|string|max:50',
            'end_date' => 'nullable|string|max:50',
            'is_current' => 'boolean',
            'duration_badge' => 'nullable|string|max:100',
            'achievements' => 'nullable|array',
            'icon_type' => 'nullable|string|max:50',
            'gradient_from' => 'nullable|string|max:20',
            'gradient_to' => 'nullable|string|max:20',
            'accent_color' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $experience->update($validated);

        return back()->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Experience deleted successfully.');
    }

    public function reorder(Request $request, Experience $experience)
    {
        $request->validate([
            'direction' => 'required|in:up,down',
        ]);

        $direction = $request->direction;
        $currentOrder = $experience->order;

        if ($direction === 'up') {
            // Find the experience with the previous order
            $previous = Experience::where('order', '<', $currentOrder)
                ->orderBy('order', 'desc')
                ->first();

            if ($previous) {
                // Swap orders
                $previousOrder = $previous->order;
                $previous->update(['order' => $currentOrder]);
                $experience->update(['order' => $previousOrder]);
            }
        } else {
            // Find the experience with the next order
            $next = Experience::where('order', '>', $currentOrder)
                ->orderBy('order', 'asc')
                ->first();

            if ($next) {
                // Swap orders
                $nextOrder = $next->order;
                $next->update(['order' => $currentOrder]);
                $experience->update(['order' => $nextOrder]);
            }
        }

        return back()->with('success', 'Order updated successfully.');
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'experience_badge' => 'nullable|string|max:255',
            'experience_heading' => 'nullable|string|max:255',
            'experience_description' => 'nullable|string|max:500',
            'experience_total_text' => 'nullable|string|max:255',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}
