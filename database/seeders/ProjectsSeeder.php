<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    public function run(): void
    {
        // Projects Page Settings
        $settings = [
            [
                'key' => 'projects_badge',
                'value' => 'Portfolio',
                'type' => 'text',
                'group' => 'projects',
                'label' => 'Badge Text',
                'order' => 1,
            ],
            [
                'key' => 'projects_heading',
                'value' => 'My Projects',
                'type' => 'text',
                'group' => 'projects',
                'label' => 'Page Heading',
                'order' => 2,
            ],
            [
                'key' => 'projects_paragraph',
                'value' => 'A collection of innovative solutions built with cutting-edge technologies. Each project represents a unique challenge solved with creativity and technical expertise.',
                'type' => 'textarea',
                'group' => 'projects',
                'label' => 'Page Description',
                'order' => 3,
            ],
            [
                'key' => 'projects_cta_heading',
                'value' => 'Have a Project in Mind?',
                'type' => 'text',
                'group' => 'projects',
                'label' => 'CTA Heading',
                'order' => 4,
            ],
            [
                'key' => 'projects_cta_text',
                'value' => "Let's collaborate and bring your ideas to life with cutting-edge cloud and DevOps solutions.",
                'type' => 'textarea',
                'group' => 'projects',
                'label' => 'CTA Text',
                'order' => 5,
            ],
            [
                'key' => 'projects_cta_button',
                'value' => 'Get In Touch',
                'type' => 'text',
                'group' => 'projects',
                'label' => 'CTA Button Text',
                'order' => 6,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // Projects
        $projects = [
            [
                'name' => 'HRMS - Human Resource Management System',
                'description' => 'Comprehensive HR management platform with employee tracking, payroll processing, leave management, and performance analytics. Built for scalability and efficiency.',
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Tailwind CSS'],
                'github_url' => 'https://github.com/imajayupadhyay',
                'detail_url' => null,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Lead Management System',
                'description' => 'Advanced CRM solution for tracking leads, managing sales pipelines, and automating follow-ups. Features real-time analytics and reporting dashboards.',
                'tech_stack' => ['Laravel', 'Livewire', 'PostgreSQL', 'Chart.js', 'Alpine.js'],
                'github_url' => 'https://github.com/imajayupadhyay',
                'detail_url' => null,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Learning Portal',
                'description' => 'Interactive e-learning platform with course management, video streaming, progress tracking, and certification system. Supports multiple user roles and permissions.',
                'tech_stack' => ['Laravel', 'Vue.js', 'AWS S3', 'FFmpeg', 'MySQL'],
                'github_url' => 'https://github.com/imajayupadhyay',
                'detail_url' => null,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'E-Commerce Website',
                'description' => 'Full-featured online store with product catalog, shopping cart, payment gateway integration, order tracking, and admin dashboard for inventory management.',
                'tech_stack' => ['Laravel', 'React', 'Stripe', 'Redis', 'Docker'],
                'github_url' => 'https://github.com/imajayupadhyay',
                'detail_url' => null,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Cloud Infrastructure Dashboard',
                'description' => 'Unified monitoring and management dashboard for multi-cloud infrastructure. Provides real-time metrics, cost analysis, and resource optimization recommendations.',
                'tech_stack' => ['Python', 'Flask', 'AWS SDK', 'Azure SDK', 'MongoDB', 'D3.js'],
                'github_url' => 'https://github.com/imajayupadhyay',
                'detail_url' => null,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'DevOps CI/CD Pipeline',
                'description' => 'Automated deployment pipeline with containerization, testing, and monitoring. Implements GitOps principles for infrastructure as code.',
                'tech_stack' => ['Jenkins', 'Docker', 'Kubernetes', 'Terraform', 'GitHub Actions'],
                'github_url' => 'https://github.com/imajayupadhyay',
                'detail_url' => null,
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['name' => $project['name']], $project);
        }
    }
}
