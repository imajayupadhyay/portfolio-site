<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'job_title' => 'Cloud Engineer',
            'company' => 'Jellyfish Technologies',
            'location' => 'Noida',
            'start_date' => 'Jul 2024',
            'end_date' => null,
            'is_current' => true,
            'duration_badge' => 'Current',
            'achievements' => [
                'Orchestrated multi-cloud infrastructure across Azure, AWS, and DigitalOcean with 99.9% uptime',
                'Architected CI/CD pipelines using GitHub Actions, Jenkins, and Azure DevOps',
                'Optimized cloud storage costs by 30% through strategic management',
                'Implemented comprehensive monitoring with Azure Monitor and CloudWatch',
            ],
            'icon_type' => 'cloud',
            'gradient_from' => '#3b82f6',
            'gradient_to' => '#8b5cf6',
            'accent_color' => '#3b82f6',
            'order' => 1,
            'is_active' => true,
        ]);

        Experience::create([
            'job_title' => 'Full Stack Developer',
            'company' => '99Notes EdTech Pvt. Ltd.',
            'location' => 'Delhi',
            'start_date' => 'Dec 2022',
            'end_date' => 'Jul 2024',
            'is_current' => false,
            'duration_badge' => '1 year 8 months',
            'achievements' => [
                'Engineered responsive web applications using Laravel, PHP, and modern JavaScript frameworks',
                'Managed 10+ production WordPress sites with 40% improved load times',
                'Administered DigitalOcean cloud infrastructure ensuring high availability',
                'Developed RESTful APIs supporting 5000+ concurrent users',
            ],
            'icon_type' => 'code',
            'gradient_from' => '#9333ea',
            'gradient_to' => '#ec4899',
            'accent_color' => '#9333ea',
            'order' => 2,
            'is_active' => true,
        ]);
    }
}
