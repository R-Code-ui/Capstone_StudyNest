<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_grade_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6']);
            $table->timestamps();

            // Prevent duplicate assignment
            $table->unique(['teacher_id', 'grade_level']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_grade_assignments');
    }
};
