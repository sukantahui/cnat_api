<?php

namespace Database\Seeders;

use App\Models\FoodPreference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodPreference::insert([
            ['food_preference_name' => 'Vegetarian'],
            ['food_preference_name' => 'Non-Vegetarian']
        ]);
    }
}
