<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationalGame;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            // Grade 4 Literacy
            ['name' => 'Word Identification', 'category' => 'literacy', 'grade_level' => 'Grade 4'],
            ['name' => 'Vocabulary Matching', 'category' => 'literacy', 'grade_level' => 'Grade 4'],
            ['name' => 'Reading Practice', 'category' => 'literacy', 'grade_level' => 'Grade 4'],
            // Grade 4 Numeracy
            ['name' => 'Basic Arithmetic', 'category' => 'numeracy', 'grade_level' => 'Grade 4'],
            ['name' => 'Number Matching', 'category' => 'numeracy', 'grade_level' => 'Grade 4'],
            ['name' => 'Addition and Subtraction Challenge', 'category' => 'numeracy', 'grade_level' => 'Grade 4'],

            // Grade 5 Literacy
            ['name' => 'Reading Comprehension', 'category' => 'literacy', 'grade_level' => 'Grade 5'],
            ['name' => 'Vocabulary Matching', 'category' => 'literacy', 'grade_level' => 'Grade 5'],
            ['name' => 'Sentence Completion', 'category' => 'literacy', 'grade_level' => 'Grade 5'],
            // Grade 5 Numeracy
            ['name' => 'Timed Math Challenge', 'category' => 'numeracy', 'grade_level' => 'Grade 5'],
            ['name' => 'Fraction Practice', 'category' => 'numeracy', 'grade_level' => 'Grade 5'],
            ['name' => 'Multiplication Challenge', 'category' => 'numeracy', 'grade_level' => 'Grade 5'],

            // Grade 6 Literacy
            ['name' => 'Reading Comprehension', 'category' => 'literacy', 'grade_level' => 'Grade 6'],
            ['name' => 'Advanced Vocabulary', 'category' => 'literacy', 'grade_level' => 'Grade 6'],
            ['name' => 'Context Clue Challenge', 'category' => 'literacy', 'grade_level' => 'Grade 6'],
            // Grade 6 Numeracy
            ['name' => 'Problem Solving Activity', 'category' => 'numeracy', 'grade_level' => 'Grade 6'],
            ['name' => 'Fraction and Decimal Challenge', 'category' => 'numeracy', 'grade_level' => 'Grade 6'],
            ['name' => 'Mathematical Reasoning Activity', 'category' => 'numeracy', 'grade_level' => 'Grade 6'],
        ];

        foreach ($games as $game) {
            EducationalGame::firstOrCreate(
                ['name' => $game['name'], 'grade_level' => $game['grade_level']],
                $game
            );
        }
    }
}
