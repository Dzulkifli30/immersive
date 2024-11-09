<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gallerys = [
            [
                'customer' => 'PoliteknikElektronika Negeri Surabaya',
                'deskripsi' => 'Poltek no 1 Se Indonesia',
                'images' => json_encode([
                    'image1.jpg',
                    'image2.jpg',
                    'image3.jpg'
                ]),
            ],
            [
                'customer' => 'RRQ',
                'deskripsi' => 'juara runner up',
                'images' => json_encode([
                    'image4.jpg',
                    'image5.jpg',
                    'image6.jpg'
                ]),
            ],
            [
                'customer' => 'Evos',
                'deskripsi' => 'evoe evos disini......',
                'images' => json_encode([
                    'image3.jpg',
                    'image4.jpg',
                    'image5.jpg'
                ]),
            ],
        ];

        foreach ($gallerys as $gallery) {
            Gallery::create($gallery);
        }
    }
}
