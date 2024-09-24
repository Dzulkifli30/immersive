<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pricings = [
            [
                'jenis' => 'Standar',
                'harga' => 50,
                'isi' => 'Fitur-fitur dasar untuk pengguna awal banyak banget dah sampe g bisa diisi disini terlalu banyak untuk diketik dan disebutkan',
            ],
            [
                'jenis' => 'Advanced',
                'harga' => 150,
                'isi' => 'Fitur tambahan untuk pengguna tingkat lanjut banyak banget dah sampe g bisa diisi disini terlalu banyak untuk diketik dan disebutkan',
            ],
            [
                'jenis' => 'Complete',
                'harga' => 300,
                'isi' => 'Semua fitur lengkap untuk skala besar banyak banget dah sampe g bisa diisi disini terlalu banyak untuk diketik dan disebutkan',
            ],
        ];

        foreach ($pricings as $pricing) {
            Pricing::create($pricing);
        }
    }
}
