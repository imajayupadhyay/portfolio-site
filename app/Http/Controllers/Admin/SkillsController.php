<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SkillsController extends Controller
{
    public function index()
    {
        $categories = SkillCategory::with('skills')
            ->orderBy('order')
            ->get();

        $settings = Setting::whereIn('key', [
            'skills_badge',
            'skills_heading',
            'skills_description',
        ])->pluck('value', 'key');

        return Inertia::render('Admin/Skills', [
            'user' => Auth::user(),
            'categories' => $categories,
            'settings' => $settings,
        ]);
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'skills_badge' => 'nullable|string|max:255',
            'skills_heading' => 'nullable|string|max:255',
            'skills_description' => 'nullable|string|max:500',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }

    // Category CRUD
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'grid_cols' => 'required|integer|min:2|max:12',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = SkillCategory::max('order') + 1;

        SkillCategory::create($validated);

        return back()->with('success', 'Category created successfully.');
    }

    public function updateCategory(Request $request, SkillCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'grid_cols' => 'required|integer|min:2|max:12',
            'is_active' => 'boolean',
        ]);

        $category->update($validated);

        return back()->with('success', 'Category updated successfully.');
    }

    public function destroyCategory(SkillCategory $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }

    // Skill CRUD
    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'skill_category_id' => 'required|exists:skill_categories,id',
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = Skill::where('skill_category_id', $validated['skill_category_id'])->max('order') + 1;

        Skill::create($validated);

        return back()->with('success', 'Skill added successfully.');
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'skill_category_id' => 'required|exists:skill_categories,id',
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $skill->update($validated);

        return back()->with('success', 'Skill updated successfully.');
    }

    public function destroySkill(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted successfully.');
    }

    // Category Reorder
    public function reorderCategory(Request $request, SkillCategory $category)
    {
        $request->validate([
            'direction' => 'required|in:up,down',
        ]);

        $direction = $request->direction;
        $currentOrder = $category->order;

        if ($direction === 'up') {
            // Find the category with the previous order
            $previous = SkillCategory::where('order', '<', $currentOrder)
                ->orderBy('order', 'desc')
                ->first();

            if ($previous) {
                // Swap orders
                $previousOrder = $previous->order;
                $previous->update(['order' => $currentOrder]);
                $category->update(['order' => $previousOrder]);
            }
        } else {
            // Find the category with the next order
            $next = SkillCategory::where('order', '>', $currentOrder)
                ->orderBy('order', 'asc')
                ->first();

            if ($next) {
                // Swap orders
                $nextOrder = $next->order;
                $next->update(['order' => $currentOrder]);
                $category->update(['order' => $nextOrder]);
            }
        }

        return back()->with('success', 'Category order updated successfully.');
    }
}
