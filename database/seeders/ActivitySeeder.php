<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        // Eco-tourism activities in Terengganu
        Activity::create([
            'name' => 'Scuba Diving',
            'activity_level' => 'High',
            'budget' => 500,
            'time_frame' => 'One Week',
            'address' => 'Pulau Perhentian, Terengganu, Malaysia',
            'description' => 'Scuba diving in Pulau Perhentian offers an unforgettable underwater experience with vibrant coral reefs and marine life. It’s a perfect activity for adventure enthusiasts and certified divers who want to explore the ocean depths.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Snorkeling',
            'activity_level' => 'High',
            'budget' => 600,
            'time_frame' => 'One Week',
            'address' => 'Pulau Redang, Terengganu, Malaysia',
            'description' => 'Snorkeling in Pulau Redang is a must-do for nature lovers. Experience crystal-clear waters teeming with colorful fish and sea turtles. It’s a family-friendly activity that doesn’t require diving experience, ideal for a week-long adventure.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Beach Relaxation',
            'activity_level' => 'Low',
            'budget' => 300,
            'time_frame' => 'Weekend',
            'address' => 'Pulau Kapas, Terengganu, Malaysia',
            'description' => 'For those seeking a relaxing escape, a weekend spent on Pulau Kapas is perfect. Enjoy the peaceful surroundings, sunbathe on the sandy beaches, and swim in the calm, warm waters. This is the ideal retreat for a peaceful getaway.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Scuba Diving',
            'activity_level' => 'High',
            'budget' => 450,
            'time_frame' => 'One Week',
            'address' => 'Pulau Tenggol, Terengganu, Malaysia',
            'description' => 'Scuba diving in Pulau Tenggol offers a thrilling adventure with crystal-clear waters and diverse marine ecosystems. Explore vibrant coral reefs and encounter exotic marine life in one of Malaysia’s best diving spots.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Beach Walks',
            'activity_level' => 'Low',
            'budget' => 50,
            'time_frame' => 'Half Day',
            'address' => 'Pantai Batu Buruk, Kuala Terengganu, Terengganu, Malaysia',
            'description' => 'Pantai Batu Buruk offers a peaceful environment for a relaxing beach walk. Enjoy the gentle waves, cool sea breeze, and tranquil scenery. This is a great spot for a half-day stroll by the beach and enjoying local seafood.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Boating and Fishing',
            'activity_level' => 'Medium',
            'budget' => 150,
            'time_frame' => 'Two Days',
            'address' => 'Tasik Kenyir, Hulu Terengganu, Terengganu, Malaysia',
            'description' => 'At Tasik Kenyir, indulge in boating and fishing amidst lush greenery. Spend two days exploring the lake, trying your hand at fishing, and taking boat trips to nearby waterfalls. This is a perfect mix of relaxation and adventure.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Bird Watching',
            'activity_level' => 'Medium',
            'budget' => 120,
            'time_frame' => 'One Day',
            'address' => 'Setiu Wetlands, Terengganu, Malaysia',
            'description' => 'Setiu Wetlands is a sanctuary for bird watchers. With over 200 species of birds, it’s a fantastic location for wildlife photography and bird watching. This day trip is perfect for nature enthusiasts and photographers.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Jungle Trekking',
            'activity_level' => 'High',
            'budget' => 200,
            'time_frame' => 'Two Days',
            'address' => 'Taman Negara Terengganu, Terengganu, Malaysia',
            'description' => 'Jungle trekking at Taman Negara Terengganu is an adventure that allows you to explore dense tropical rainforests, encounter diverse wildlife, and enjoy scenic river cruises. This two-day trek is ideal for those looking for an immersive nature experience.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Elephant Conservation Visit',
            'activity_level' => 'Low',
            'budget' => 100,
            'time_frame' => 'Half Day',
            'address' => 'Kenyir Elephant Conservation Village, Terengganu, Malaysia',
            'description' => 'Visit the Kenyir Elephant Conservation Village for a unique opportunity to learn about and interact with elephants. Spend half a day observing these majestic creatures and understanding conservation efforts in a serene setting.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Cultural Heritage Tour',
            'activity_level' => 'Low',
            'budget' => 80,
            'time_frame' => 'One Day',
            'address' => 'Terrapuri Heritage Village, Setiu, Terengganu, Malaysia',
            'description' => 'The Terrapuri Heritage Village offers a cultural escape into traditional Malay architecture and heritage. Take a leisurely tour to learn about local history, customs, and enjoy authentic local cuisine.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Waterfall Trekking',
            'activity_level' => 'Medium',
            'budget' => 40,
            'time_frame' => 'Half Day',
            'address' => 'Sekayu Waterfall, Hulu Terengganu, Terengganu, Malaysia',
            'description' => 'Sekayu Waterfall provides a beautiful setting for a half-day trek. Hike through the lush jungle and cool off in the natural pools beneath the waterfall. It’s a great option for nature lovers looking to enjoy a short yet rewarding hike.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Waterfall Hiking',
            'activity_level' => 'High',
            'budget' => 100,
            'time_frame' => 'One Day',
            'address' => 'Chemerong Waterfall, Hulu Terengganu, Terengganu, Malaysia',
            'description' => 'Chemerong Waterfall is one of the highest in Terengganu. The hike to the waterfall is challenging but offers a rewarding view of the cascading water and the surrounding jungle. Ideal for adventurous hikers.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Island Relaxation',
            'activity_level' => 'Medium',
            'budget' => 400,
            'time_frame' => 'Three Days',
            'address' => 'Lang Tengah Island, Terengganu, Malaysia',
            'description' => 'Lang Tengah Island offers the perfect three-day retreat for beach lovers. Relax on pristine beaches, snorkel in the clear waters, or enjoy the island’s serene ambiance away from the crowds.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Beach Picnic',
            'activity_level' => 'Low',
            'budget' => 60,
            'time_frame' => 'Half Day',
            'address' => 'Penarik Beach, Setiu, Terengganu, Malaysia',
            'description' => 'Penarik Beach is a quiet and peaceful spot, ideal for a half-day picnic. Enjoy the scenic views, relax in the shade, and savor fresh seafood from local vendors.',
            'user_id' => 2, // Assigned user_id
        ]);
    }
}
