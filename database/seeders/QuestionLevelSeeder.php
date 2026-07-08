<?php

namespace Database\Seeders;

use App\Models\QuestionLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionLevel::insert([
            ['question_level_name' => 'Easy'],
            ['question_level_name' => 'Medium'],
            ['question_level_name' => 'Hard'],
        ]);
    }
}
