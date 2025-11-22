<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing',
                'description' => 'Articles about cloud platforms, architecture, and best practices',
                'color' => '#3B82F6',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
                'description' => 'DevOps practices, CI/CD, automation, and infrastructure',
                'color' => '#8B5CF6',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Development',
                'slug' => 'development',
                'description' => 'Programming, web development, and coding tutorials',
                'color' => '#10B981',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Tutorials',
                'slug' => 'tutorials',
                'description' => 'Step-by-step guides and hands-on tutorials',
                'color' => '#F59E0B',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
