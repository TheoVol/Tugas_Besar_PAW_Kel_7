<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stall;

class StallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stall::insert([
            [
                'nama_usaha' => 'Warung Penjual 1',
                'kantin_id' => 1, 
                'user_id' => 3,   
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_usaha' => 'Ramen Penjual 2',
                'kantin_id' => 2, 
                'user_id' => 4,  
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
