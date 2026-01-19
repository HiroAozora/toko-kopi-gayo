<?php

namespace Database\Seeders;

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
        // Check if user exists to avoid duplicates
        if (!User::where('email', 'admin@gayo.com')->exists()) {
            User::create([
                'name' => 'Admin Gayo',
                'email' => 'admin@gayo.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
