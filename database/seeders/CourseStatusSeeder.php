<?php

namespace Database\Seeders;

use App\Models\CourseStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        CourseStatus::insert([
            ['course_status_name' => 'Ongoing'],
            ['course_status_name' => 'Completed'],
            ['course_status_name' => 'Incomplete'],
        ]);
    }
}
