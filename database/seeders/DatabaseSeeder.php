<?php

namespace Database\Seeders;


use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use App\Models\UserType;
use App\Models\Gender;
use App\Models\FoodPreference;
use App\Models\State;
use App\Models\District;
use App\Models\Course;
use App\Models\CourseStatus;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Topic;
use App\Models\QuestionType;
use App\Models\QuestionLevel;
use App\Models\Question;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // UserType::insert([
        //     ['user_type_name' => 'Admin'],
        //     ['user_type_name' => 'Developer'],
        //     ['user_type_name' => 'Owner'],
        //     ['user_type_name' => 'Manager'],
        //     ['user_type_name' => 'Teacher'],
        //     ['user_type_name' => 'Manager Sale'],
        //     ['user_type_name' => 'Worker'],
        // ]);

        $this->call([
            UserTypeSeeder::class,
            FeeModeSeeder::class,
        ]);

        Department::insert([
            ['department_name' => 'Administration'],
            ['depatment_name' => 'Development'],
            ['depatment_name' => 'Teaching'],
            ['depatment_name' => 'Office'],
        ]);
        Designation::insert([
            ['designation_name' => 'Administrator'],
            ['designation_name' => 'Developer'],
            ['designation_name' => 'Owner'],
            ['designation_name' => 'Manager'],
            ['designation_name' => 'Teacher'],
            ['designation_name' => 'Manager Sale'],
            ['designation_name' => 'Worker'],
            ['designation_name' => 'Student'],
        ]);
        Employee::insert([
            ['employee_name' => 'Sukanta Hui', 'mobile' => '9830371685', 'email' => 'sukantahui@gmail.com', 'department_id' => 1, 'designation_id' => 1],
            ['employee_name' => 'Tanusree Hui', 'mobile' => '9051724200', 'email' => 'tanusreehui@gmail.com', 'department_id' => 3, 'designation_id' => 5],
            ['employee_name' => 'Chandan Das', 'mobile' => '9836987171', 'email' => 'chandan.dasy2k10@gmail.com', 'department_id' => 1, 'designation_id' => 1],
            ['employee_name' => 'Ritaja Ghosh', 'mobile' => '7003310220', 'email' => 'ritajaghosh@gmail.com', 'department_id' => 4, 'designation_id' => 4]
        ]);
        //admin created
        $user = User::create([
            'email' => 'sukantahui',
            'password' => Hash::make('Cnat@1977'),
            'user_type_id' => 1,
            'employee_id' => 1
        ]);
        $this->command->info('Created user ADMIN:');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );

        //user: Teacher
        $user = User::create([
            'email' => 'tanusreehui',
            'password' => Hash::make('Cnat@1977'),
            'user_type_id' => 5,
            'employee_id' => 2
        ]);
        $this->command->info('Created user ADMIN:');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );

        //admin created
        $user = User::create([
            'email' => 'chandandas',
            'password' => Hash::make('Cnat@1977'),
            'user_type_id' => 1,
            'employee_id' => 3
        ]);
        $this->command->info('Created user ADMIN:');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );

        //developer created
        $user = User::create([
            'email' => 'developer@gmail.com',
            'password' => Hash::make('Cnat@1977'),
            'user_type_id' => 2,
            'employee_id' => 2
        ]);
        $this->command->info('Created user: Developer');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );
        //owner created
        $user = User::create([
            'email' => 'owner@gmail.com',
            'password' => Hash::make('Cnat@1977'),
            'user_type_id' => 3,
            'employee_id' => 1
        ]);
        $this->command->info('Created user: owner');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );

        //owner created
        $user = User::create([
            'email' => 'manager@gmail.com',
            'password' => Hash::make('Cnat1977'),
            'user_type_id' => 4,
            'employee_id' => 3
        ]);
        $this->command->info('Created user: Manager');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );

        //ritaja created
        $user = User::create([
            'email' => 'ritajaghosh@gmail.com',
            'password' => Hash::make('Ghosh@2000'),
            'user_type_id' => 4,
            'employee_id' => 4
        ]);
        $this->command->info('Created user: Manager');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );



        
        


        $this->call([
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
    }
}
