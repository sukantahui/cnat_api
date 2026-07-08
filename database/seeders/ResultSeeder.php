<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('results')->insert([
            [
                'admission_id' => 1,
                'attempt_no' => 1,
                'theory_marks' => 78,
                'practical_marks' => 89,
                'total_theory_marks' => 100,
                'total_practical_marks' => 100,
                'grade' => 'A',
                'is_passed' => true,
                'result_date' => '2025-07-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}