<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call each seeder in the desired order
        $this->call([
            AdminUserSeeder::class,
            ActivitySeeder::class,
            TimeSeeder::class,
            PhotoSeeder::class,
            ContactsTableSeeder::class,
            CodeSeeder::class,
        ]);
    }
}
