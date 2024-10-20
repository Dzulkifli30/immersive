<?php

namespace Database\Seeders;

use App\Models\Headers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Headers::create([
            'judul' => 'MF Immersif',
            'subjudul' => 'butuh booth immersif dengan harga terjangkau dan mudah untuk digunakan? bisa hubungi kami lewat whatsapp hehe....',
            'gambar' => 'header-smartphone.png',
        ]);
    }
}
