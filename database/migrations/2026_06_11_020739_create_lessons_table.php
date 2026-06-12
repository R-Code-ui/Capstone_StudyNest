<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6']);
            $table->string('school_year'); // e.g., "2026-2027"
            $table->enum('trimester', ['1st Trimester', '2nd Trimester', '3rd Trimester']);
            $table->string('week_number'); // "Week 1" ... "Week 12"
            $table->string('bow_code')->nullable();
            $table->text('learning_competency')->nullable();
            $table->text('learning_objective')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('content'); // rich text
            $table->text('key_takeaways')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->date('publish_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
