<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $categories = SkillCategory::with(['skills' => function ($query) {
            $query->active();
        }])
        ->active()
        ->get()
        ->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'icon' => $category->icon,
                'grid_cols' => $category->grid_cols,
                'skills' => $category->skills->map(function ($skill) {
                    return [
                        'name' => $skill->name,
                        'icon' => $skill->icon,
                        'color' => $skill->color,
                    ];
                }),
            ];
        });

        $settings = Setting::whereIn('key', [
            'skills_badge',
            'skills_heading',
            'skills_description',
        ])->pluck('value', 'key');

        return response()->json([
            'categories' => $categories,
            'settings' => [
                'badge' => $settings['skills_badge'] ?? 'My Tech Stack',
                'heading' => $settings['skills_heading'] ?? 'Skills & Technologies',
                'description' => $settings['skills_description'] ?? 'Expertise across cloud platforms, DevOps tools, and modern development technologies',
            ],
        ]);
    }
}
