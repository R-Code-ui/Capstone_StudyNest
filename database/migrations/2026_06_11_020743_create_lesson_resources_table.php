<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained('lessons')->onDelete('cascade');
            $table->string('file_path');
            $table->enum('file_type', ['pdf_module', 'worksheet', 'image']);
            $table->string('original_name');
            $table->integer('size')->nullable(); // in KB
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_resources');
    }
};
