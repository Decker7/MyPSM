<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Time;


class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example data to seed the Time table for activity_id 1 to 14
        $times = [
            ['activity_id' => 1, 'date' => '2023-10-01', 'time' => '10:00:00'],
            ['activity_id' => 1, 'date' => '2023-10-02', 'time' => '14:00:00'],
            ['activity_id' => 2, 'date' => '2023-10-03', 'time' => '09:00:00'],
            ['activity_id' => 2, 'date' => '2023-10-04', 'time' => '16:00:00'],
            ['activity_id' => 3, 'date' => '2023-10-05', 'time' => '11:00:00'],
            ['activity_id' => 3, 'date' => '2023-10-06', 'time' => '13:00:00'],
            ['activity_id' => 4, 'date' => '2023-10-07', 'time' => '10:00:00'],
            ['activity_id' => 4, 'date' => '2023-10-08', 'time' => '15:00:00'],
            ['activity_id' => 5, 'date' => '2023-10-09', 'time' => '09:00:00'],
            ['activity_id' => 5, 'date' => '2023-10-10', 'time' => '14:00:00'],
            ['activity_id' => 6, 'date' => '2023-10-11', 'time' => '10:00:00'],
            ['activity_id' => 6, 'date' => '2023-10-12', 'time' => '16:00:00'],
            ['activity_id' => 7, 'date' => '2023-10-13', 'time' => '09:00:00'],
            ['activity_id' => 7, 'date' => '2023-10-14', 'time' => '15:00:00'],
            ['activity_id' => 8, 'date' => '2023-10-15', 'time' => '11:00:00'],
            ['activity_id' => 8, 'date' => '2023-10-16', 'time' => '13:00:00'],
            ['activity_id' => 9, 'date' => '2023-10-17', 'time' => '10:00:00'],
            ['activity_id' => 9, 'date' => '2023-10-18', 'time' => '15:00:00'],
            ['activity_id' => 10, 'date' => '2023-10-19', 'time' => '09:00:00'],
            ['activity_id' => 10, 'date' => '2023-10-20', 'time' => '14:00:00'],
            ['activity_id' => 11, 'date' => '2023-10-21', 'time' => '10:00:00'],
            ['activity_id' => 11, 'date' => '2023-10-22', 'time' => '16:00:00'],
            ['activity_id' => 12, 'date' => '2023-10-23', 'time' => '09:00:00'],
            ['activity_id' => 12, 'date' => '2023-10-24', 'time' => '15:00:00'],
            ['activity_id' => 13, 'date' => '2023-10-25', 'time' => '11:00:00'],
            ['activity_id' => 13, 'date' => '2023-10-26', 'time' => '13:00:00'],
            ['activity_id' => 14, 'date' => '2023-10-27', 'time' => '10:00:00'],
            ['activity_id' => 14, 'date' => '2023-10-28', 'time' => '15:00:00'],
        ];

        // Insert the data into the Time table
        foreach ($times as $time) {
            Time::create($time);
        }
    }
}
