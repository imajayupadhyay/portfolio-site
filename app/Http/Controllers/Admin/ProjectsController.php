<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProjectsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Projects', [
            'user' => Auth::user(),
            'projects' => Project::orderBy('order')->get(),
            'settings' => Setting::where('group', 'projects')->orderBy('order')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'nullable|array',
            'github_url' => 'nullable|url|max:255',
            'detail_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = Project::max('order') + 1;
        $validated['tech_stack'] = $validated['tech_stack'] ?? [];

        Project::create($validated);

        return back()->with('success', 'Project created successfully.');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'nullable|array',
            'github_url' => 'nullable|url|max:255',
            'detail_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['tech_stack'] = $validated['tech_stack'] ?? [];

        $project->update($validated);

        return back()->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Project deleted successfully.');
    }

    public function reorder(Request $request, Project $project)
    {
        $request->validate([
            'direction' => 'required|in:up,down',
        ]);

        $direction = $request->direction;
        $currentOrder = $project->order;

        if ($direction === 'up') {
            // Find the project with the previous order
            $previous = Project::where('order', '<', $currentOrder)
                ->orderBy('order', 'desc')
                ->first();

            if ($previous) {
                // Swap orders
                $previousOrder = $previous->order;
                $previous->update(['order' => $currentOrder]);
                $project->update(['order' => $previousOrder]);
            }
        } else {
            // Find the project with the next order
            $next = Project::where('order', '>', $currentOrder)
                ->orderBy('order', 'asc')
                ->first();

            if ($next) {
                // Swap orders
                $nextOrder = $next->order;
                $next->update(['order' => $currentOrder]);
                $project->update(['order' => $nextOrder]);
            }
        }

        return back()->with('success', 'Order updated successfully.');
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
}
