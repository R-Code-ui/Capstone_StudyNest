<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('game_id')->constrained('educational_games');
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6']);
            $table->date('due_date')->nullable();
            $table->integer('attempts_allowed')->default(1);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->date('publish_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_assignments');
    }
};
