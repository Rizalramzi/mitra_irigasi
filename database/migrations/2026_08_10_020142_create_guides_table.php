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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['starter_kit', 'video']);
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('category')->nullable();
            $table->string('icon')->default('🛠️');
            $table->string('duration')->nullable();
            $table->string('youtube_url')->nullable();
            $table->json('tools_and_materials')->nullable();
            $table->json('steps')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
