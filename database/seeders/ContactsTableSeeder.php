<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbackMessages = [
            "I love the eco-friendly activities offered on your website!",
            "The booking process was very smooth and user-friendly.",
            "I found the activity descriptions very informative and helpful.",
            "It’s great to see a platform promoting sustainable tourism.",
            "The budget filter made it easy to find activities within my range.",
            "I enjoyed discovering new eco-tourism spots through your platform.",
            "The website design is beautiful and easy to navigate.",
            "I appreciate the focus on preserving the environment.",
            "Adding more images for each activity would enhance the experience.",
            "The activity levels helped me choose the right adventure for my family.",
            "It’s wonderful to support local eco-tourism businesses through your platform.",
            "I had an amazing experience booking a guided hiking tour.",
            "The activity filters make searching so much easier!",
            "Thank you for providing such detailed information about each activity.",
            "I would love to see more activities related to marine conservation.",
            "Your website inspired me to explore eco-friendly travel options.",
            "The time frame filter helped me plan my day efficiently.",
            "I love the idea of promoting eco-tourism to preserve nature.",
            "The activity ratings were very helpful in making a decision.",
            "Keep up the great work in promoting sustainable travel!"
        ];

        $contacts = [];
        foreach ($feedbackMessages as $index => $message) {
            $contacts[] = [
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'message' => $message,
            ];
        }

        DB::table('contacts')->insert($contacts);
    }
}
