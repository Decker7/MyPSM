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
            'activity_level' => 'Challenging',
            'budget' => 550,
            'time_frame' => 'Long (Full-day: 6+ hours)',
            'rating' => 4.8,
            'address' => 'Pulau Perhentian, Terengganu, Malaysia',
            'description' => 'Scuba diving in Pulau Perhentian offers an unforgettable underwater experience with vibrant coral reefs and marine life. It’s a perfect activity for adventure enthusiasts and certified divers who want to explore the ocean depths.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Snorkeling',
            'activity_level' => 'Moderate',
            'budget' => 180,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.5,
            'address' => 'Pulau Redang, Terengganu, Malaysia',
            'description' => 'Snorkeling in Pulau Redang is a must-do for nature lovers. Experience crystal-clear waters teeming with colorful fish and sea turtles. It’s a family-friendly activity that doesn’t require diving experience.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Beach Getaway',
            'activity_level' => 'Leisurely',
            'budget' => 120,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.3,
            'address' => 'Pulau Kapas, Terengganu, Malaysia',
            'description' => 'For those seeking a relaxing escape, a half-day spent on Pulau Kapas is perfect. Enjoy the peaceful surroundings, sunbathe on the sandy beaches, and swim in the calm, warm waters. This is the ideal retreat for a peaceful getaway.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Bird Watching',
            'activity_level' => 'Moderate',
            'budget' => 100,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.0,
            'address' => 'Setiu Wetlands, Terengganu, Malaysia',
            'description' => 'Setiu Wetlands is a sanctuary for bird watchers. With over 200 species of birds, it’s a fantastic location for wildlife photography and bird watching. This day trip is perfect for nature enthusiasts and photographers.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Jungle Trekking',
            'activity_level' => 'Challenging',
            'budget' => 300,
            'time_frame' => 'Long (Full-day: 6+ hours)',
            'rating' => 4.7,
            'address' => 'Taman Negara Terengganu, Terengganu, Malaysia',
            'description' => 'Jungle trekking at Taman Negara Terengganu is an adventure that allows you to explore dense tropical rainforests, encounter diverse wildlife, and enjoy scenic river cruises. This full-day trek is ideal for those looking for an immersive nature experience.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Waterfall Trekking',
            'activity_level' => 'Moderate',
            'budget' => 50,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 3.9,
            'address' => 'Sekayu Waterfall, Hulu Terengganu, Terengganu, Malaysia',
            'description' => 'Sekayu Waterfall provides a beautiful setting for a short trek. Hike through the lush jungle and cool off in the natural pools beneath the waterfall. It’s a great option for nature lovers looking to enjoy a quick yet rewarding hike.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Island Retreat',
            'activity_level' => 'Leisurely',
            'budget' => 400,
            'time_frame' => 'Long (Full-day: 6+ hours)',
            'rating' => 4.6,
            'address' => 'Lang Tengah Island, Terengganu, Malaysia',
            'description' => 'Lang Tengah Island offers the perfect retreat for beach lovers. Relax on pristine beaches, snorkel in the clear waters, or enjoy the island’s serene ambiance away from the crowds.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Mangrove Kayaking',
            'activity_level' => 'Moderate',
            'budget' => 250,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.4,
            'address' => 'Setiu Mangrove Forest, Terengganu, Malaysia',
            'description' => 'Explore the stunning mangrove ecosystem in Setiu while kayaking. This activity combines adventure and environmental education, making it perfect for eco-tourism enthusiasts.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Turtle Conservation Tour',
            'activity_level' => 'Leisurely',
            'budget' => 150,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.9,
            'address' => 'Turtle Conservation Centre, Rantau Abang, Terengganu, Malaysia',
            'description' => 'Learn about turtle conservation efforts and witness these majestic creatures up close. This tour offers a meaningful experience for wildlife lovers and conservation advocates.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Cultural Village Experience',
            'activity_level' => 'Leisurely',
            'budget' => 100,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.2,
            'address' => 'Terengganu State Museum, Kuala Terengganu, Malaysia',
            'description' => 'Experience the cultural heritage of Terengganu by exploring traditional Malay villages, handicrafts, and local foods. Perfect for those interested in history and culture.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'River Cruise',
            'activity_level' => 'Leisurely',
            'budget' => 80,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.1,
            'address' => 'Sungai Terengganu, Kuala Terengganu, Malaysia',
            'description' => 'Enjoy a serene river cruise along Sungai Terengganu, taking in views of mangroves and local wildlife. Ideal for families and couples seeking a peaceful outing.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Fishing Village Tour',
            'activity_level' => 'Leisurely',
            'budget' => 90,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.3,
            'address' => 'Kuala Besut, Terengganu, Malaysia',
            'description' => 'Explore the daily lives of fishermen, learn traditional fishing techniques, and enjoy freshly caught seafood. A cultural and culinary adventure awaits.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Hot Springs Visit',
            'activity_level' => 'Leisurely',
            'budget' => 70,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.0,
            'address' => 'La Hot Springs, Terengganu, Malaysia',
            'description' => 'Relax and rejuvenate in the natural hot springs of La, surrounded by tranquil landscapes. Perfect for unwinding after a day of adventure.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Seafood Culinary Workshop',
            'activity_level' => 'Moderate',
            'budget' => 150,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.6,
            'address' => 'Kampung Cina, Kuala Terengganu, Malaysia',
            'description' => 'Learn to prepare authentic Terengganu seafood dishes in a hands-on workshop. A delicious experience for food enthusiasts.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'River Tubing Adventure',
            'activity_level' => 'Moderate',
            'budget' => 120,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.5,
            'address' => 'Hulu Terengganu, Terengganu, Malaysia',
            'description' => 'Float down the river on a tube and enjoy the thrill of mild rapids surrounded by lush greenery. Perfect for adventure seekers looking for a fun water activity.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Traditional Boat Making',
            'activity_level' => 'Moderate',
            'budget' => 200,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.7,
            'address' => 'Pulau Duyong, Kuala Terengganu, Malaysia',
            'description' => 'Learn about the traditional art of boat making in Pulau Duyong. This interactive experience offers insight into Terengganu’s maritime heritage.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Island Camping',
            'activity_level' => 'Challenging',
            'budget' => 350,
            'time_frame' => 'Long (Full-day: 6+ hours)',
            'rating' => 4.8,
            'address' => 'Gemia Island, Terengganu, Malaysia',
            'description' => 'Camp under the stars on the secluded Gemia Island. Enjoy activities like snorkeling, trekking, and stargazing in a tranquil setting.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Eco-Education Tour',
            'activity_level' => 'Leisurely',
            'budget' => 140,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.4,
            'address' => 'Kenyir Elephant Conservation Village, Terengganu, Malaysia',
            'description' => 'Gain knowledge about elephant conservation and interact with these gentle giants in their natural habitat. A meaningful experience for eco-tourists.',
            'user_id' => 2, // Assigned user_id
        ]);

        Activity::create([
            'name' => 'Mangrove Forest Night Walk',
            'activity_level' => 'Challenging',
            'budget' => 200,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.8,
            'address' => 'Setiu Mangrove Forest, Terengganu, Malaysia',
            'description' => 'Experience the tranquility of the mangrove forest at night. Observe nocturnal wildlife and enjoy the soothing sounds of nature under the stars.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Coral Planting Workshop',
            'activity_level' => 'Moderate',
            'budget' => 300,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.9,
            'address' => 'Pulau Redang Marine Park, Terengganu, Malaysia',
            'description' => 'Learn about coral reef conservation and participate in planting coral fragments to restore marine ecosystems. A fulfilling activity for eco-conscious travelers.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Water Buffalo Farm Visit',
            'activity_level' => 'Leisurely',
            'budget' => 100,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.2,
            'address' => 'Kampung Bukit Tok Beng, Terengganu, Malaysia',
            'description' => 'Discover the rural charm of Terengganu with a visit to a traditional water buffalo farm. Learn about their role in local agriculture and enjoy the serene surroundings.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Sea Turtle Hatchling Release',
            'activity_level' => 'Leisurely',
            'budget' => 180,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.7,
            'address' => 'Turtle Conservation Centre, Rantau Abang, Terengganu, Malaysia',
            'description' => 'Join the conservation team in releasing sea turtle hatchlings into the ocean. A heartwarming and educational experience for all ages.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Traditional Fishing Experience',
            'activity_level' => 'Moderate',
            'budget' => 120,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.5,
            'address' => 'Kuala Terengganu, Terengganu, Malaysia',
            'description' => 'Experience life as a local fisherman. Learn traditional fishing techniques and enjoy the fresh catch of the day cooked in a traditional style.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'River Safari Adventure',
            'activity_level' => 'Challenging',
            'budget' => 220,
            'time_frame' => 'Long (Full-day: 6+ hours)',
            'rating' => 4.6,
            'address' => 'Kenyir Lake, Terengganu, Malaysia',
            'description' => 'Embark on a river safari through the serene waters of Kenyir Lake. Discover hidden waterfalls, wildlife, and stunning landscapes in this eco-paradise.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Traditional Weaving Workshop',
            'activity_level' => 'Leisurely',
            'budget' => 90,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.3,
            'address' => 'Kampung Losong, Terengganu, Malaysia',
            'description' => 'Learn the art of traditional songket weaving from skilled artisans. Take home a unique handmade souvenir from your experience.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Eco-Bike Tour',
            'activity_level' => 'Moderate',
            'budget' => 150,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.4,
            'address' => 'Kuala Nerus, Terengganu, Malaysia',
            'description' => 'Explore the scenic countryside of Terengganu on an eco-bike tour. Visit traditional villages, lush rice fields, and local landmarks while promoting sustainable travel.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Floating Market Experience',
            'activity_level' => 'Leisurely',
            'budget' => 80,
            'time_frame' => 'Short (1–2 hours)',
            'rating' => 4.1,
            'address' => 'Pulau Warisan, Terengganu, Malaysia',
            'description' => 'Visit the vibrant floating market and explore local produce, handmade crafts, and traditional foods. A unique cultural and shopping experience.',
            'user_id' => 3,
        ]);

        Activity::create([
            'name' => 'Rainforest Canopy Walk',
            'activity_level' => 'Challenging',
            'budget' => 250,
            'time_frame' => 'Medium (Half-day: 3–5 hours)',
            'rating' => 4.8,
            'address' => 'Taman Negara Terengganu, Terengganu, Malaysia',
            'description' => 'Experience breathtaking views of the rainforest from above as you walk along canopy bridges. This adventure is ideal for thrill-seekers and nature lovers.',
            'user_id' => 3,
        ]);
    }
}
