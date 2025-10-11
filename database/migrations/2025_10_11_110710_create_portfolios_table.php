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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., Modern Kitchen Elegance
            $table->string('material'); // e.g., marble calf
            $table->string('location')->nullable(); // e.g., London, UK
            $table->enum('category', ['kitchen', 'bathroom', 'flooring', 'staircase', 'commercial']); 
            $table->string('image_url'); // URL for the project image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
