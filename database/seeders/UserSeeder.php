<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'password' => Hash::make('petugas'),
            'role' => 'petugas'
        ]);

        User::create([
            'name' => 'Pengunjung',
            'email' => 'pengunjung@example.com',
            'password' => Hash::make('pengunjung'),
            'role' => 'pengunjung'
        ]);
    }
}