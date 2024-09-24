<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriPendidikan = KategoriBerita::where('nama', 'pendidikan')->first()->id;
        $kategoriTeknologi = KategoriBerita::where('nama', 'teknologi')->first()->id;
        $kategoriSejarah = KategoriBerita::where('nama', 'sejarah')->first()->id;

        Berita::create([
            'tanggal' => '2024-09-01',
            'isi' => 'Ini adalah berita tentang pendidikan.',
            'judul' => 'Pendidikan di Era Digital',
            'kategori_id' => $kategoriPendidikan,
            'kontributor' => 'John Doe',
            'gambar' => null,
        ]);

        Berita::create([
            'tanggal' => '2024-09-02',
            'isi' => 'Teknologi terbaru yang sedang booming.',
            'judul' => 'Revolusi Teknologi 2024',
            'kategori_id' => $kategoriTeknologi,
            'kontributor' => 'Jane Doe',
            'gambar' => null,
        ]);

        Berita::create([
            'tanggal' => '2024-09-03',
            'isi' => 'Sejarah perkembangan teknologi.',
            'judul' => 'Sejarah Teknologi di Dunia',
            'kategori_id' => $kategoriSejarah,
            'kontributor' => 'Jim Beam',
            'gambar' => null,
        ]);
    }
}
