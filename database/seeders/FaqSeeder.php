<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'pertanyaan' => 'Apa itu Laravel?',
            'isi' => 'Laravel adalah framework PHP yang open-source, menyediakan arsitektur MVC untuk mengembangkan aplikasi web.'
        ]);

        Faq::create([
            'pertanyaan' => 'Bagaimana cara menginstal Laravel?',
            'isi' => 'Anda dapat menginstal Laravel menggunakan Composer dengan perintah: composer create-project --prefer-dist laravel/laravel nama_proyek.'
        ]);

        Faq::create([
            'pertanyaan' => 'Apa keunggulan utama Laravel?',
            'isi' => 'Laravel menawarkan fitur seperti routing yang mudah, ORM yang kuat (Eloquent), dan sistem templating yang fleksibel (Blade).'
        ]);
    }
}
