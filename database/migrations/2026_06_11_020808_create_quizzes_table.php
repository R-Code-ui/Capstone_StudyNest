<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->nullOnDelete();
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6']);
            $table->foreignId('subject_id')->constrained('subjects');
            $table->string('school_year');
            $table->enum('trimester', ['1st Trimester', '2nd Trimester', '3rd Trimester']);
            $table->string('week_number');
            $table->string('title');
            $table->enum('quiz_type', ['multiple_choice', 'identification', 'true_false']);
            $table->integer('total_questions');
            $table->integer('time_limit')->nullable(); // minutes
            $table->integer('passing_score')->nullable(); // percentage
            $table->integer('attempts_allowed')->default(1);
            $table->boolean('shuffle_questions')->default(false);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->date('publish_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
