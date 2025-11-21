<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->insert([
            ['key' => 'experience_badge', 'value' => 'Professional Journey'],
            ['key' => 'experience_heading', 'value' => 'Work Experience'],
            ['key' => 'experience_description', 'value' => 'Building scalable cloud solutions and driving digital transformation'],
            ['key' => 'experience_total_text', 'value' => '3+ Years of Professional Experience'],
        ]);
    }

    public function down(): void
    {
        DB::table('settings')->where('key', 'like', 'experience_%')->delete();
    }
};
