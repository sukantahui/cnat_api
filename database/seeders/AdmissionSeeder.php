<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admissions')->insert([
            [
                'admission_number' => 'Regn-10231-2425',
                'student_id' => 49,
                'course_id' => 31,
                'course_status_id' => 2, // Active
                'course_fees' => 5500,
                'fee_modes_id'=> 2,
                'admission_date' => '2025-01-14',
                'completion_date' => '2025-07-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admission_number' => 'REGN-00001-2627',
                'student_id' => 1,
                'course_id' => 21,          // You will fill this
                'course_status_id' => 1,      // Active
                'course_fees' => 600,
                'fee_modes_id'=> 1,
                'admission_date' => '2026-04-09',
                'completion_date' => null,
                'created_at' => '2026-04-09 06:06:24',
                'updated_at' => '2026-04-09 06:06:24',
            ],
            [
                'admission_number' => 'REGN-00002-2627',
                'student_id' => 2,
                'course_id' => 4,          // You will fill this
                'course_status_id' => 1,      // Active
                'course_fees' => 500,
                'fee_modes_id'=> 1,
                'admission_date' => '2026-04-09',
                'completion_date' => null,
                'created_at' => '2026-04-09 06:06:24',
                'updated_at' => '2026-04-09 06:06:24',
            ],

            // Add more admissions here...
        ]);
    }
}
