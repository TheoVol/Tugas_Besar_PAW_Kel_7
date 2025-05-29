<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kantin;

class KantinSeeder extends Seeder
{
    public function run(): void
    {
        Kantin::insert([
            [
                'nama' => 'Kantin Asrama Putri',
                'lokasi' => 'Gedung Asrama A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kantin Fakultas Informatika',
                'lokasi' => 'Gedung D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kantin Gedung Kuliah Umum',
                'lokasi' => 'Gedung GKU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
