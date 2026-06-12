<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_assignment_id')->constrained('game_assignments')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('users');
            $table->float('score')->nullable();
            $table->integer('attempt_number');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_results');
    }
};
