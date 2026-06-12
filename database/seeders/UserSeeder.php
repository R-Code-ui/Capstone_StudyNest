<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ========== PRINCIPAL ==========
        $principal = User::firstOrCreate(
            ['principal_id' => 'PRN-001'],
            [
                'first_name' => 'Admin',
                'last_name' => 'Principal',
                'email' => 'principal@studynest.com',
                'password' => Hash::make('Principal123'),
                'principal_id' => 'PRN-001',
                'grade_level' => null,
                'is_archived' => false,
            ]
        );
        $principal->assignRole('principal');

        // ========== TEACHERS ==========
        // Teacher for Grade 4 only
        $teacher1 = User::firstOrCreate(
            ['teacher_id' => 'TCH-001'],
            [
                'first_name' => 'Maria',
                'last_name' => 'Santos',
                'email' => 'maria.santos@studynest.com',
                'password' => Hash::make('Teacher123'),
                'teacher_id' => 'TCH-001',
                'grade_level' => null,
                'is_archived' => false,
            ]
        );
        $teacher1->assignRole('teacher');

        // Teacher for Grades 5 & 6
        $teacher2 = User::firstOrCreate(
            ['teacher_id' => 'TCH-002'],
            [
                'first_name' => 'Juan',
                'last_name' => 'Reyes',
                'email' => 'juan.reyes@studynest.com',
                'password' => Hash::make('Teacher123'),
                'teacher_id' => 'TCH-002',
                'grade_level' => null,
                'is_archived' => false,
            ]
        );
        $teacher2->assignRole('teacher');

        // ========== STUDENTS ==========
        // Grade 4 Student
        $student1 = User::firstOrCreate(
            ['lrn' => '118784260018'],
            [
                'first_name' => 'Angelo',
                'last_name' => 'Santos',
                'email' => 'angelo.santos@studynest.com',
                'password' => Hash::make('Student123'),
                'lrn' => '118784260018',
                'grade_level' => 'Grade 4',
                'is_archived' => false,
            ]
        );
        $student1->assignRole('student');

        // Grade 5 Student
        $student2 = User::firstOrCreate(
            ['lrn' => '118784260019'],
            [
                'first_name' => 'Maria',
                'last_name' => 'Clara',
                'email' => 'maria.clara@studynest.com',
                'password' => Hash::make('Student123'),
                'lrn' => '118784260019',
                'grade_level' => 'Grade 5',
                'is_archived' => false,
            ]
        );
        $student2->assignRole('student');

        // Grade 6 Student
        $student3 = User::firstOrCreate(
            ['lrn' => '118784260020'],
            [
                'first_name' => 'Pedro',
                'last_name' => 'Reyes',
                'email' => 'pedro.reyes@studynest.com',
                'password' => Hash::make('Student123'),
                'lrn' => '118784260020',
                'grade_level' => 'Grade 6',
                'is_archived' => false,
            ]
        );
        $student3->assignRole('student');

        // ========== TEACHER GRADE ASSIGNMENTS ==========
        // Assign TCH-001 to Grade 4
        \DB::table('teacher_grade_assignments')->updateOrInsert(
            ['teacher_id' => $teacher1->id, 'grade_level' => 'Grade 4'],
            ['created_at' => now(), 'updated_at' => now()]
        );

        // Assign TCH-002 to Grade 5 and Grade 6
        \DB::table('teacher_grade_assignments')->updateOrInsert(
            ['teacher_id' => $teacher2->id, 'grade_level' => 'Grade 5'],
            ['created_at' => now(), 'updated_at' => now()]
        );
        \DB::table('teacher_grade_assignments')->updateOrInsert(
            ['teacher_id' => $teacher2->id, 'grade_level' => 'Grade 6'],
            ['created_at' => now(), 'updated_at' => now()]
        );
    }
}
