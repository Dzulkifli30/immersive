<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonis = [
            [
                'nama' => 'John Doe',
                'pekerjaan' => 'Software Engineer',
                'testi' => 'This platform has helped me streamline my work processes.',
                'foto' => null,
            ],
            [
                'nama' => 'Jane Smith',
                'pekerjaan' => 'Marketing Manager',
                'testi' => 'Amazing experience! It has boosted our productivity significantly.',
                'foto' => null,
            ],
            [
                'nama' => 'Michael Johnson',
                'pekerjaan' => 'Product Designer',
                'testi' => 'The user-friendly interface made my job so much easier.',
                'foto' => null,
            ],
            [
                'nama' => 'Emily Davis',
                'pekerjaan' => 'HR Specialist',
                'testi' => 'It helped us manage our team more effectively.',
                'foto' => null,
            ],
            [
                'nama' => 'Robert Brown',
                'pekerjaan' => 'CEO',
                'testi' => 'Great service with excellent customer support.',
                'foto' => null,
            ],
        ];

        foreach ($testimonis as $testimoni) {
            Testimoni::create($testimoni);
        }
    }
}
