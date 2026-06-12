<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // ========== PERMISSIONS ==========
        // Lesson permissions
        $lessonPermissions = [
            'lesson.view', 'lesson.create', 'lesson.edit', 'lesson.delete'
        ];
        // Assignment permissions
        $assignmentPermissions = [
            'assignment.view', 'assignment.create', 'assignment.edit', 'assignment.delete', 'assignment.grade'
        ];
        // Quiz permissions
        $quizPermissions = [
            'quiz.view', 'quiz.create', 'quiz.edit', 'quiz.delete', 'quiz.view_results'
        ];
        // Game permissions
        $gamePermissions = [
            'game.assign', 'game.view_results'
        ];
        // Announcement permissions
        $announcementPermissions = [
            'announcement.view', 'announcement.create', 'announcement.edit', 'announcement.delete'
        ];
        // Report permissions
        $reportPermissions = [
            'report.view', 'report.export'
        ];
        // Management permissions (Principal only)
        $managementPermissions = [
            'user.manage', 'teacher.manage', 'student.manage'
        ];
        // Student specific
        $studentPermissions = [
            'lesson.view', 'assignment.view', 'quiz.view', 'game.play',
            'announcement.view', 'message.send', 'progress.view'
        ];

        $allPermissions = array_merge(
            $lessonPermissions,
            $assignmentPermissions,
            $quizPermissions,
            $gamePermissions,
            $announcementPermissions,
            $reportPermissions,
            $managementPermissions,
            $studentPermissions
        );

        foreach ($allPermissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // ========== ROLES ==========
        // Principal role – gets all permissions
        $principalRole = Role::firstOrCreate(['name' => 'principal']);
        $principalRole->givePermissionTo(Permission::all());

        // Teacher role – gets teaching & reporting permissions
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $teacherRole->givePermissionTo([
            'lesson.view', 'lesson.create', 'lesson.edit', 'lesson.delete',
            'assignment.view', 'assignment.create', 'assignment.edit', 'assignment.delete', 'assignment.grade',
            'quiz.view', 'quiz.create', 'quiz.edit', 'quiz.delete', 'quiz.view_results',
            'game.assign', 'game.view_results',
            'announcement.view', 'announcement.create', 'announcement.edit', 'announcement.delete',
            'report.view', 'report.export'
        ]);

        // Student role – limited to viewing, playing, sending messages
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $studentRole->givePermissionTo($studentPermissions);
    }
}
