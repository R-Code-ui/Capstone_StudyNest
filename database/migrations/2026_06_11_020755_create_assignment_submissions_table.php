<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('users');
            $table->string('submission_method'); // digital_upload, photo_upload, paper_based
            $table->string('file_path')->nullable();
            $table->string('photo_path')->nullable();
            $table->boolean('paper_marked')->default(false);
            $table->float('score')->nullable();
            $table->text('feedback')->nullable();
            $table->enum('status', ['not_submitted', 'submitted', 'late', 'reviewed', 'graded', 'returned'])->default('not_submitted');
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('graded_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};
