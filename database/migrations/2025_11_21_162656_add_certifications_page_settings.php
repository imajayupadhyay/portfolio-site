<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->insert([
            ['key' => 'certifications_badge', 'value' => 'Professional Certifications'],
            ['key' => 'certifications_heading', 'value' => 'Industry Certifications'],
            ['key' => 'certifications_description', 'value' => 'Validated expertise in cloud computing and DevOps practices'],
        ]);
    }

    public function down(): void
    {
        DB::table('settings')->whereIn('key', [
            'certifications_badge',
            'certifications_heading',
            'certifications_description',
        ])->delete();
    }
};
