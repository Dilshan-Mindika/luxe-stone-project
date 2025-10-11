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
        // In the up() method
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., Kitchen Worktops
            $table->string('slug')->unique(); // for URL, e.g., kitchen-worktops
            $table->string('subtitle')->nullable(); 
            $table->text('description')->nullable();
            $table->string('hero_image_url')->nullable(); // URL for the hero image
            $table->string('icon_svg_path')->nullable(); // Stores the SVG icon code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
