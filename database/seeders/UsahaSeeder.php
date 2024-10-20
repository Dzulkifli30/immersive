<?php

namespace Database\Seeders;

use App\Models\Usaha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usaha::create(['bidang_usaha' => 'Pendidikan']);
        Usaha::create(['bidang_usaha' => 'Makanan/Minuman']);
        Usaha::create(['bidang_usaha' => 'Fashion']);
    }
}
