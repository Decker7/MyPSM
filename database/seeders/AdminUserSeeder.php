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
        // Create the admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'user_type' => 'admin',
            'bio' => 'This is the administrator account.',
            'password' => Hash::make('123'),
        ]);

        // Create the activity owner user
        User::create([
            'first_name' => 'Activity',
            'last_name' => 'Owner',
            'name' => 'Activity Owner',
            'email' => 'activity_owner@example.com',
            'user_type' => 'activity_owner',
            'bio' => 'This is the activity owner account.',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'first_name' => 'Second',
            'last_name' => 'Owner',
            'name' => 'Second Activity Owner',
            'email' => 'second_activity_owner@example.com',
            'user_type' => 'activity_owner',
            'bio' => 'This is another activity owner account.',
            'password' => Hash::make('123'),
        ]);

        User::create([
            'first_name' => 'customer',
            'last_name' => 'User',
            'name' => 'Customer User',
            'email' => 'cust@example.com',
            'user_type' => 'customer',
            'bio' => 'This is the administrator account.',
            'password' => Hash::make('123'),
        ]);
    }
}
