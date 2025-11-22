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
        Schema::table('blog_posts', function (Blueprint $table) {
            // Drop the old category string column
            $table->dropColumn('category');

            // Add the new category_id foreign key
            $table->foreignId('blog_category_id')->after('featured_image')->constrained('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            // Drop the foreign key
            $table->dropForeign(['blog_category_id']);
            $table->dropColumn('blog_category_id');

            // Add back the old category string column
            $table->string('category')->after('featured_image');
        });
    }
};
