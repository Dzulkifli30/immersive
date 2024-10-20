<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use App\Models\Testimoni;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class]);
        $this->call([HeaderSeeder::class]);
        $this->call([FeaturesSeeder::class]);
        $this->call([TestimoniSeeder::class]);
        $this->call([PricingSeeder::class]);
        $this->call([FaqSeeder::class]);
        $this->call([KategoriBeritaSeeder::class]);
        $this->call([BeritaSeeder::class]);
        $this->call([GallerySeeder::class]);
        $this->call([UsahaSeeder::class]);
        $this->call([BiodataSeeder::class]);
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
