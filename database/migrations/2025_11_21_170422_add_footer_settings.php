<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->insert([
            ['key' => 'footer_copyright', 'value' => 'Ajay Upadhyay. All rights reserved.'],
            ['key' => 'footer_linkedin', 'value' => 'https://www.linkedin.com/in/ajay-upadhyay-b4568a170/'],
            ['key' => 'footer_github', 'value' => 'https://github.com/ajayupadhya'],
            ['key' => 'footer_email', 'value' => 'ajayatrishi@gmail.com'],
            ['key' => 'footer_phone', 'value' => '+919560905775'],
            ['key' => 'footer_twitter', 'value' => ''],
            ['key' => 'footer_instagram', 'value' => ''],
        ]);
    }

    public function down(): void
    {
        DB::table('settings')->where('key', 'like', 'footer_%')->delete();
    }
};
