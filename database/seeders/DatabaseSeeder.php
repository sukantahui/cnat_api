<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        $this->call([
            UserTypeSeeder::class,
            FeeModeSeeder::class,
            DepartmentSeeder::class,    
            DesignationSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
            GenderSeeder::class,
            FoodPreferenceSeeder::class,
            StateDistrictSeeder::class,
            CourseWithDetailsSeeder::class,
            StudentSeeder::class,
            CourseStatusSeeder::class,
            AdmissionSeeder::class,
            ResultSeeder::class,
            CertificateSeeder::class,
            QuestionTypeSeeder::class,
            QuestionLevelSeeder::class,
            SubjectWithChaptersSeeder::class,
            
        ]);
        $this->call([
            PythonIntroductionSeeder::class,
            PythonListIntroductionSeeder::class,
            PythonOperatorsExpressionsSeeder::class,
            PythonVariablesSyntaxSeeder::class,
            TuplesSeeder::class,
            

        ]);
    }
}
