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
                'customer' => 'Politeknik No 1 di Indonesia',
                'deskripsi' => 'customer no 1 Se Indonesia',
                'images' => json_encode([
                    'image1.jpg',
                    'image2.jpg',
                    'image3.jpg'
                ]),
            ],
            [
                'customer' => 'yang kedua g tau dah',
                'deskripsi' => 'emang runner up dianggap',
                'images' => json_encode([
                    'image4.jpg',
                    'image5.jpg',
                    'image6.jpg'
                ]),
            ],
            [
                'customer' => 'Evos Mau bangkrut',
                'deskripsi' => 'tevos tevos disini wleeeeee......',
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
