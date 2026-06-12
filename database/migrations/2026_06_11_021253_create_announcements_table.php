<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->enum('author_role', ['principal', 'teacher']);
            $table->string('title');
            $table->string('category'); // e.g., "Reminder", "Quiz Schedule"
            $table->longText('message');
            $table->enum('target_audience', ['all_users', 'all_grades', 'grade_4', 'grade_5', 'grade_6', 'teachers_only']);
            $table->enum('priority', ['normal', 'important', 'urgent'])->default('normal');
            $table->boolean('is_pinned')->default(false);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->date('publish_date');
            $table->date('expiration_date')->nullable();
            $table->json('attachment')->nullable(); // store file info
            $table->timestamps();

            // Foreign key constraint depends on author_role – handled in application logic
            // We skip foreign key here because author can be from users table but two roles.
            // You can add a foreign key to users.id if you ensure consistency.
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
