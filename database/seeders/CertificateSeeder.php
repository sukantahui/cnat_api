<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certificate::create([
                'admission_id' => 1,
                'certificate_number' => 'CNAT-20250715125440',
                'issue_date' => '2025-07-15',
                'is_valid' => true,
                'created_at' => now(),
                'updated_at' => now(),]);
    }
}
