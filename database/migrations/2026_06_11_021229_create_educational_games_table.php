<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('educational_games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['literacy', 'numeracy']);
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6']);
            $table->text('description')->nullable();
            $table->json('game_data')->nullable(); // config for the game (e.g., URL, settings)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educational_games');
    }
};
