<?php

namespace Database\Seeders;

use App\Models\FeeMode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeeMode::create(['fee_modes_name' => 'Monthly']);
        FeeMode::create(['fee_modes_name' => 'Course Fees']);
    }
}
