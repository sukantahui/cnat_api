<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionType::insert([
            ['question_type_name' => 'Multiple Choice', 'default_marks' => 1],
            ['question_type_name' => 'True/False', 'default_marks' => 1],
            ['question_type_name' => 'Multiple Answers', 'default_marks' => 2],
            ['question_type_name' => 'Short Answer', 'default_marks' => 2],
            ['question_type_name' => 'Essay', 'default_marks' => 5],
            ['question_type_name' => 'Fill in the Blanks', 'default_marks' => 1],
        ]);
        
    }
}
