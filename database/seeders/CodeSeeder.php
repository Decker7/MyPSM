<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity; // Ensure the Activity model is imported
use App\Models\Code;     // Ensure the Code model is imported

class CodeSeeder extends Seeder
{
    public function run()
    {
        // Fetch all activities from the database
        $activities = Activity::all();

        // Loop through each activity and create a unique code
        foreach ($activities as $activity) {
            Code::create([
                'activity_id' => $activity->id,
                'code_number' => 'DEST' . str_pad($activity->id, 5, '0', STR_PAD_LEFT), // Generates a code like DEST00001
            ]);
        }
    }
}
