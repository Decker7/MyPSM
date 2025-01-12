<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            [
                'activities_id' => 1, // Replace with a valid activity ID from the `activities` table
                'path_photo' => 'images/Gallery/pulau-perhentian-1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'activities_id' => 1, // Replace with a valid activity ID from the `activities` table
            //     'path_photo' => 'images/pulau-perhentian-2.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'activities_id' => 2, // Replace with a valid activity ID from the `activities` table
            //     'path_photo' => 'images/activity2/photo1.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'activities_id' => 3, // Replace with a valid activity ID from the `activities` table
            //     'path_photo' => 'images/activity3/photo1.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
