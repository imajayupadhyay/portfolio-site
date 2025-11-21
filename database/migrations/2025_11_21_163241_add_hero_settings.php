<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->insert([
            ['key' => 'hero_greeting', 'value' => "Hello, I'm"],
            ['key' => 'hero_name', 'value' => 'Ajay Upadhyay'],
            ['key' => 'hero_roles', 'value' => json_encode(['Software Engineer', 'Cloud Engineer', 'DevOps Engineer', 'AWS Solutions Architect', 'Azure Administrator'])],
            ['key' => 'hero_description', 'value' => 'Orchestrating multi-cloud infrastructure with expertise in AWS, Azure, and DevOps. Passionate about automating workflows and building scalable solutions with 99.9% uptime.'],
            ['key' => 'hero_stat1_value', 'value' => '3+'],
            ['key' => 'hero_stat1_label', 'value' => 'Years Exp.'],
            ['key' => 'hero_stat2_value', 'value' => '3'],
            ['key' => 'hero_stat2_label', 'value' => 'Certifications'],
            ['key' => 'hero_stat3_value', 'value' => '99.9%'],
            ['key' => 'hero_stat3_label', 'value' => 'Uptime'],
            ['key' => 'hero_cta1_text', 'value' => 'Get In Touch'],
            ['key' => 'hero_cta1_url', 'value' => '/contact'],
            ['key' => 'hero_cta2_text', 'value' => 'Download Resume'],
            ['key' => 'hero_resume', 'value' => '/Ajay_Upadhyay_Resume.pdf'],
            ['key' => 'hero_profile_image', 'value' => '/images/profile.png'],
            ['key' => 'hero_badge1_title', 'value' => 'Cloud & DevOps'],
            ['key' => 'hero_badge1_subtitle', 'value' => 'Specialized in'],
            ['key' => 'hero_badge2_title', 'value' => 'AWS'],
            ['key' => 'hero_badge2_subtitle', 'value' => 'Certified'],
            ['key' => 'hero_badge3_title', 'value' => 'Azure'],
            ['key' => 'hero_badge3_subtitle', 'value' => 'Certified'],
        ]);
    }

    public function down(): void
    {
        DB::table('settings')->where('key', 'like', 'hero_%')->delete();
    }
};
