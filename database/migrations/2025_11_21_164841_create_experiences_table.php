<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('company');
            $table->string('location')->nullable();
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->string('duration_badge')->nullable();
            $table->json('achievements')->nullable();
            $table->string('icon_type')->default('briefcase');
            $table->string('gradient_from')->default('#3b82f6');
            $table->string('gradient_to')->default('#8b5cf6');
            $table->string('accent_color')->default('#3b82f6');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
