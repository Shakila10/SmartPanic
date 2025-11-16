<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::firstOrCreate([
            'name' => 'RT',
            'email' => 'rt@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'alamat' => 'Lorong Kuningan, Jl. Lingkar Barat II',
            'no_hp' => '08123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User
        User::firstOrCreate([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'alamat' => 'Lorong Kuningan, Jl. Lingkar Barat II',
            'no_hp' => '08123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::firstOrCreate([
            'name' => 'Shakila',
            'email' => 'shakila@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'alamat' => 'Mendalo Darat',
            'no_hp' => '6289604382502',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
