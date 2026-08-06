<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
