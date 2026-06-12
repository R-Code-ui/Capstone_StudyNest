<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_exports', function (Blueprint $table) {
            $table->id();
            $table->morphs('exportable'); // teacher_id or principal_id
            $table->string('report_type');
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6'])->nullable();
            $table->foreignId('subject_id')->nullable()->constrained('subjects');
            $table->enum('trimester', ['1st Trimester', '2nd Trimester', '3rd Trimester'])->nullable();
            $table->timestamp('generated_at');
            $table->string('file_path')->nullable(); // if you store files
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_exports');
    }
};
