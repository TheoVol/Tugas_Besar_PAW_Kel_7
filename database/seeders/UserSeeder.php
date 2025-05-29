<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Customer 1',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Penjual 1',
            'email' => 'penjual1@gmail.com',
            'password' => Hash::make('penjual123'),
            'role' => 'penjual',
        ]);

        User::create([
            'name' => 'Penjual 2',
            'email' => 'penjual2@gmail.com',
            'password' => Hash::make('penjual234'),
            'role' => 'penjual',
        ]);
    }
}
