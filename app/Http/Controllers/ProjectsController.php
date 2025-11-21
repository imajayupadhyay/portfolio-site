<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Inertia\Inertia;
use Inertia\Response;

class ProjectsController extends Controller
{
    public function index(): Response
    {
        $projects = Project::active()->get()->map(function ($project) {
            return [
                'name' => $project->name,
                'description' => $project->description,
                'techStack' => $project->tech_stack,
                'githubUrl' => $project->github_url,
                'detailUrl' => $project->detail_url,
            ];
        });

        $settings = Setting::where('group', 'projects')->pluck('value', 'key');

        return Inertia::render('Projects', [
            'projects' => $projects,
            'settings' => $settings,
        ]);
    }
}
