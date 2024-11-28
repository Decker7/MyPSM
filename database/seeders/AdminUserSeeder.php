<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',                // Admin's first name
            'last_name' => 'User',                 // Admin's last name
            'name' => 'Admin User',                // Full name or username
            'email' => 'admin@example.com',        // Admin's email address
            'user_type' => 'admin',                // Set user type to 'admin'
            'bio' => 'This is the administrator account.', // Short bio for admin
            'password' => Hash::make('password123'), // Use a secure password
        ]);
    }
}
