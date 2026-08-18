<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;                   
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ketua Panitia',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('rahasia123'),
            'role' => 'admin'
        ]);
    }
}
