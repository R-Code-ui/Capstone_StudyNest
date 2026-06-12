<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Student fields
            $table->string('lrn')->unique()->nullable()->after('email');
            // Teacher field
            $table->string('teacher_id')->unique()->nullable()->after('lrn');
            // Principal field
            $table->string('principal_id')->unique()->nullable()->after('teacher_id');
            // Name split
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            // Grade level for students (nullable for teachers/principal)
            $table->enum('grade_level', ['Grade 4', 'Grade 5', 'Grade 6'])->nullable()->after('last_name');
            // Archive flag
            $table->boolean('is_archived')->default(false)->after('grade_level');
            // Last activity tracking
            $table->timestamp('last_activity_at')->nullable()->after('is_archived');
            // Remove the default 'name' column if you want to use first_name + last_name only
            // (Optional) – you can keep 'name' as a virtual attribute or drop it.
            // For simplicity, we keep 'name' but you can later ignore it.
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'lrn', 'teacher_id', 'principal_id',
                'first_name', 'last_name', 'grade_level',
                'is_archived', 'last_activity_at'
            ]);
        });
    }
};
