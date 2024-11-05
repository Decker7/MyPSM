<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        // Sample data for activities
        Activity::create([
            'name' => 'Beach Relaxation',
            'activity_level' => 'Low',
            'budget' => 30,
            'time_frame' => 'One Week',
            'image' => 'images/Beach1.jpg', // Path to image in public/images
        ]);

        Activity::create([
            'name' => 'Mountain Hiking',
            'activity_level' => 'High',
            'budget' => 150,
            'time_frame' => 'Two Weeks',
            'image' => 'images/Boat1.jpg', // Path to image in public/images
        ]);

        // Add more activities with images if needed
    }
}
