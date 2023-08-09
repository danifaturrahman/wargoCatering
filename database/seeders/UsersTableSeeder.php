<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pengguna Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);

        // Pengguna Pelanggan
        User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@example.com',
            'password' => Hash::make('password'),
            'role' => 'Pelanggan',
        ]);
    }
}
