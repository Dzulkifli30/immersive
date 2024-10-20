<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Biodata::create([
            'nama_usaha' => 'Interact Connect',
            'bidang_usaha_id' => 1,
            'alamat' => 'PENS',
            'nomor_telpon' => '085886587944',
            'user_id' => 3,
            'gambar' => json_encode([
                'image1.jpg',
                'image2.jpg',
                'image3.jpg'
            ]),
        ]);
        
        Biodata::create([
            'nama_usaha' => 'Interact Connect',
            'bidang_usaha_id' => 1,
            'alamat' => 'PENS',
            'nomor_telpon' => '085886587944',
            'user_id' => 2,
            'gambar' => json_encode([
                'image4.jpg',
                'image5.jpg',
                'image6.jpg'
            ]),
        ]);
        
    }
}
