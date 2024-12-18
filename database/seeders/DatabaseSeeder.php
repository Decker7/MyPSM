<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ActivitySeeder::class,
            AdminUserSeeder::class, // Include the AdminUserSeeder
            TimeSeeder::class, // Register the TimeSeeder

        ]);
    }

    
}
