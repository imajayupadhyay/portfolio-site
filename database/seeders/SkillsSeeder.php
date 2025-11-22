<?php

namespace Database\Seeders;

use App\Models\SkillCategory;
use App\Models\Skill;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create settings
        Setting::updateOrCreate(['key' => 'skills_badge'], ['value' => 'My Tech Stack']);
        Setting::updateOrCreate(['key' => 'skills_heading'], ['value' => 'Skills & Technologies']);
        Setting::updateOrCreate(['key' => 'skills_description'], ['value' => 'Expertise across cloud platforms, DevOps tools, and modern development technologies']);

        // Cloud Platforms
        $cloudCategory = SkillCategory::create([
            'name' => 'Cloud Platforms',
            'grid_cols' => 5,
            'is_active' => true,
            'order' => 1,
        ]);

        $cloudSkills = [
            ['name' => 'AWS', 'icon' => 'aws', 'color' => '#FF9900'],
            ['name' => 'Azure', 'icon' => 'azure', 'color' => '#0089D6'],
            ['name' => 'Azure DevOps', 'icon' => 'azuredevops', 'color' => '#0078D7'],
            ['name' => 'DigitalOcean', 'icon' => 'digitalocean', 'color' => '#0080FF'],
            ['name' => 'Hostinger', 'icon' => 'server', 'color' => '#673DE6'],
        ];

        foreach ($cloudSkills as $index => $skill) {
            Skill::create([
                'skill_category_id' => $cloudCategory->id,
                'name' => $skill['name'],
                'icon' => $skill['icon'],
                'color' => $skill['color'],
                'is_active' => true,
                'order' => $index + 1,
            ]);
        }

        // DevOps & Tools
        $devOpsCategory = SkillCategory::create([
            'name' => 'DevOps & Tools',
            'grid_cols' => 6,
            'is_active' => true,
            'order' => 2,
        ]);

        $devOpsSkills = [
            ['name' => 'Git', 'icon' => 'git', 'color' => '#F05032'],
            ['name' => 'GitHub', 'icon' => 'github', 'color' => '#181717'],
            ['name' => 'Docker', 'icon' => 'docker', 'color' => '#2496ED'],
            ['name' => 'Kubernetes', 'icon' => 'kubernetes', 'color' => '#326CE5'],
            ['name' => 'Terraform', 'icon' => 'terraform', 'color' => '#7B42BC'],
            ['name' => 'Ansible', 'icon' => 'ansible', 'color' => '#EE0000'],
        ];

        foreach ($devOpsSkills as $index => $skill) {
            Skill::create([
                'skill_category_id' => $devOpsCategory->id,
                'name' => $skill['name'],
                'icon' => $skill['icon'],
                'color' => $skill['color'],
                'is_active' => true,
                'order' => $index + 1,
            ]);
        }

        // Programming & Scripting
        $programmingCategory = SkillCategory::create([
            'name' => 'Programming & Scripting',
            'grid_cols' => 5,
            'is_active' => true,
            'order' => 3,
        ]);

        $programmingSkills = [
            ['name' => 'Python', 'icon' => 'python', 'color' => '#3776AB'],
            ['name' => 'JavaScript', 'icon' => 'javascript', 'color' => '#F7DF1E'],
            ['name' => 'PHP', 'icon' => 'php', 'color' => '#777BB4'],
            ['name' => 'Bash', 'icon' => 'bash', 'color' => '#4EAA25'],
            ['name' => 'Shell', 'icon' => 'terminal', 'color' => '#89E051'],
        ];

        foreach ($programmingSkills as $index => $skill) {
            Skill::create([
                'skill_category_id' => $programmingCategory->id,
                'name' => $skill['name'],
                'icon' => $skill['icon'],
                'color' => $skill['color'],
                'is_active' => true,
                'order' => $index + 1,
            ]);
        }

        // Web Development
        $webDevCategory = SkillCategory::create([
            'name' => 'Web Development',
            'grid_cols' => 5,
            'is_active' => true,
            'order' => 4,
        ]);

        $webDevSkills = [
            ['name' => 'React.js', 'icon' => 'react', 'color' => '#61DAFB'],
            ['name' => 'Laravel', 'icon' => 'laravel', 'color' => '#FF2D20'],
            ['name' => 'WordPress', 'icon' => 'wordpress', 'color' => '#21759B'],
            ['name' => 'MySQL', 'icon' => 'mysql', 'color' => '#4479A1'],
            ['name' => 'NGINX', 'icon' => 'nginx', 'color' => '#009639'],
        ];

        foreach ($webDevSkills as $index => $skill) {
            Skill::create([
                'skill_category_id' => $webDevCategory->id,
                'name' => $skill['name'],
                'icon' => $skill['icon'],
                'color' => $skill['color'],
                'is_active' => true,
                'order' => $index + 1,
            ]);
        }

        // Monitoring & Logging
        $monitoringCategory = SkillCategory::create([
            'name' => 'Monitoring & Logging',
            'grid_cols' => 4,
            'is_active' => true,
            'order' => 5,
        ]);

        $monitoringSkills = [
            ['name' => 'Azure Monitor', 'icon' => 'monitor', 'color' => '#0089D6'],
            ['name' => 'CloudWatch', 'icon' => 'cloudwatch', 'color' => '#FF9900'],
            ['name' => 'Prometheus', 'icon' => 'prometheus', 'color' => '#E6522C'],
            ['name' => 'Grafana', 'icon' => 'grafana', 'color' => '#F46800'],
        ];

        foreach ($monitoringSkills as $index => $skill) {
            Skill::create([
                'skill_category_id' => $monitoringCategory->id,
                'name' => $skill['name'],
                'icon' => $skill['icon'],
                'color' => $skill['color'],
                'is_active' => true,
                'order' => $index + 1,
            ]);
        }
    }
}
