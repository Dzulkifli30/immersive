<?php

namespace Database\Seeders;

use App\Models\Features;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Features::create([
            'judul' => 'Mudah digunakan',
            'isi' => 'You sales force can use the app on any smartphone platform without compatibility issues',
            'icon' => null,
        ]);
        Features::create([
            'judul' => 'Mudah digunakan',
            'isi' => 'You sales force can use the app on any smartphone platform without compatibility issues',
            'icon' => null,
        ]);
        Features::create([
            'judul' => 'Mudah digunakan',
            'isi' => 'You sales force can use the app on any smartphone platform without compatibility issues',
            'icon' => null,
        ]);
        Features::create([
            'judul' => 'Mudah digunakan',
            'isi' => 'You sales force can use the app on any smartphone platform without compatibility issues',
            'icon' => null,
        ]);
    }
}
