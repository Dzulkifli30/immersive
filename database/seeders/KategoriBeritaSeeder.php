<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBerita::create(['nama' => 'pendidikan']);
        KategoriBerita::create(['nama' => 'teknologi']);
        KategoriBerita::create(['nama' => 'sejarah']);
    }
}
