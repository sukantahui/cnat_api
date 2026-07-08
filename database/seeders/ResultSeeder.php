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
                'theory_marks' => 68,
                'practical_marks' => 69,
                'total_theory_marks' => 100,
                'total_practical_marks' => 100,
                'grade' => 'B',
                'is_passed' => true,
                'result_date' => '2025-06-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admission_id' => 1,
                'attempt_no' => 2,
                'theory_marks' => 81,
                'practical_marks' => 89,
                'total_theory_marks' => 100,
                'total_practical_marks' => 100,
                'grade' => 'A',
                'is_passed' => true,
                'result_date' => '2025-07-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admission_id' => 4,
                'attempt_no' => 1,
                'theory_marks' => 78,
                'practical_marks' => 89,
                'total_theory_marks' => 100,
                'total_practical_marks' => 100,
                'grade' => 'A',
                'is_passed' => true,
                'result_date' => '2026-04-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admission_id' => 4,
                'attempt_no' => 2,
                'theory_marks' => 84,
                'practical_marks' => 96,
                'total_theory_marks' => 100,
                'total_practical_marks' => 100,
                'grade' => 'A',
                'is_passed' => true,
                'result_date' => '2026-05-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}