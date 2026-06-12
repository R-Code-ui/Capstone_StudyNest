<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->text('question_text');
            // For multiple choice
            $table->string('option_a')->nullable();
            $table->string('option_b')->nullable();
            $table->string('option_c')->nullable();
            $table->string('option_d')->nullable();
            $table->enum('correct_option', ['a', 'b', 'c', 'd'])->nullable();
            // For identification
            $table->string('correct_answer')->nullable();
            $table->json('alternative_answers')->nullable(); // e.g., ["mars", "MARS", "Planet Mars"]
            // For true/false
            $table->boolean('correct_boolean')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
