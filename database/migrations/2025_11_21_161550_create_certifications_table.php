<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('level')->nullable(); // Associate, Fundamentals, etc.
            $table->string('code')->nullable(); // DVA-C02, AZ-104, etc.
            $table->string('provider'); // Amazon Web Services, Microsoft Azure
            $table->string('badge_image')->nullable();
            $table->string('credential_url')->nullable();
            $table->string('gradient_from')->default('#3b82f6'); // Tailwind color
            $table->string('gradient_to')->default('#8b5cf6');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
