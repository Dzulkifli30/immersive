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
            'judul' => 'Pengalaman yang Memorable',
            'isi' => 'Konsumen dapat berinteraksi langsung dengan produk secara virtual, seolah-olah mereka sedang menggunakan produk tersebut. Hal ini membuat mereka lebih terhubung',
            'icon' => null,
        ]);
        Features::create([
            'judul' => 'Visualisasi Produk yang Lebih Baik',
            'isi' => 'Konsumen dapat melihat produk dari berbagai sudut, menguji fitur-fiturnya, dan bahkan menyesuaikan tampilan produk sesuai dengan preferensi mereka',
            'icon' => null,
        ]);
        Features::create([
            'judul' => 'Interaktivitas',
            'isi' => 'Konsumen dapat bermain game, menjawab kuis, atau mengikuti tantangan yang terkait dengan produk, sehingga meningkatkan engagement mereka.',
            'icon' => null,
        ]);
    }
}
