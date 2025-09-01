<?php

namespace Database\Seeders;


use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use App\Models\UserType;
use App\Models\Gender;
use App\Models\FoodPreference;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        UserType::insert([
            ['user_type_name' => 'Admin'],
            ['user_type_name' => 'Developer'],
            ['user_type_name' => 'Owner'],
            ['user_type_name' => 'Manager'],
            ['user_type_name' => 'Manager Production'],
            ['user_type_name' => 'Manager Sale'],
            ['user_type_name' => 'Worker'],
        ]);

        Department::insert([
            ['department_name' => 'Administration'],
            ['depatment_name' => 'Development'],
            ['depatment_name' => 'Ownership'],
            ['depatment_name' => 'Office'],
        ]);
        Designation::insert([
            ['designation_name' => 'Administrator'],
            ['designation_name' => 'Developer'],
            ['designation_name' => 'Owner'],
            ['designation_name' => 'Manager'],
            ['designation_name' => 'Manager Production'],
            ['designation_name' => 'Manager Sale'],
            ['designation_name' => 'Worker'],
        ]);
        Employee::insert([
            ['employee_name'=>'Vivekanada','mobile'=>'9836444999','email'=>'bangle312@gmail.com','department_id' => 3, 'designation_id' => 3],
            ['employee_name'=>'Sukanta Hui','mobile'=>'7003756860','email'=>'sukantahui@gmail.com','department_id' => 2, 'designation_id' => 2],
            ['employee_name'=>'Saheb Ghosh','mobile'=>'8334861999','email'=>'sahebghosh89@gmail.com','department_id' => 4, 'designation_id' => 4]
        ]);
        //admin created
        $user=User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id'=>1,
            'employee_id'=>2
        ]);
        $this->command->info('Created user ADMIN:');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );
        //developer created
        $user=User::create([
            'email' => 'developer@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id'=>2,
            'employee_id'=>2
        ]);
        $this->command->info('Created user: Developer');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );
        //owner created
        $user=User::create([
            'email' => 'owner@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id'=>3,
            'employee_id'=>1
        ]);
        $this->command->info('Created user: owner');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );

        //owner created
        $user=User::create([
            'email' => 'manager@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id'=>4,
            'employee_id'=>3
        ]);
        $this->command->info('Created user: Manager');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );
        Gender::insert([
            ['gender_name'=>'Male'],
            ['gender_name'=>'Female'],
            ['gender_name'=>'Other'],
        ]);
        FoodPreference::insert([
            ['food_preference_name'=>'Vegetarian'],
            ['food_preference_name'=>'Non-Vegetarian']
        ]);
    }     
}
