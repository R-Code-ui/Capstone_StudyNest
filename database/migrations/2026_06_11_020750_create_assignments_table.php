<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->nullOnDelete();
            $table->foreignId('subject_id')->constrained('subjects');
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6']);
            $table->string('school_year');
            $table->enum('trimester', ['1st Trimester', '2nd Trimester', '3rd Trimester']);
            $table->string('week_number');
            $table->string('title');
            $table->string('type'); // homework, worksheet, performance_task, etc.
            $table->longText('instructions');
            $table->integer('total_points');
            $table->integer('estimated_time')->nullable(); // minutes
            $table->boolean('allow_late_submission')->default(false);
            $table->date('due_date');
            $table->time('due_time');
            $table->json('submission_methods'); // ["digital_upload","photo_upload","paper_based"]
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->date('publish_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
