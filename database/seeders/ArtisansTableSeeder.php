<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ArtisansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Retrieve some existing user IDs from the 'users' table to reference
        $userIds = DB::table('users')->pluck('user_id');

        // Check if there are any users to avoid errors
        if ($userIds->isEmpty()) {
            Log::warning('No users found to seed artisans.');
            return;
        }

        // Define possible specializations for artisans
        $specializations = [
            'Handwoven Textiles',
            'Jewelry Making',
            'Pottery',
            'Wood Carving',
            'Baskets and Handicrafts',
            'Coffee Accessories',
            'Leather Crafting',
            'Art',
        ];

        // Insert sample data into the 'artisans' table
        foreach ($userIds as $userId) {
            // Generate a sample biography
            $bio = $this->generateRandomBio();

            // Randomly select a few specializations for each artisan
            $selectedSpecializations = $this->getRandomSpecializations($specializations, 3); // Selecting 3 specializations as an example

            DB::table('artisans')->insert([
                'artisan_id' => $userId, // Assuming 'artisan_id' references 'user_id'
                'bio' => $bio, // Randomly generated biography
                'specialization' => json_encode($selectedSpecializations), // Randomly selected specializations
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
    }

    /**
     * Generate a random biography for an artisan.
     *
     * @return string
     */
    private function generateRandomBio(): string
    {
        // Sample biographies
        $bios = [
            'Experienced artisan with a passion for traditional craftsmanship and innovative designs.',
            'Skilled in a variety of techniques with a focus on high-quality, handcrafted products.',
            'Dedicated to preserving cultural heritage through artisan skills and bespoke creations.',
            'Innovative artisan blending traditional methods with modern aesthetics.',
        ];

        // Return a random biography from the list
        return $bios[array_rand($bios)];
    }

    /**
     * Get a specified number of random unique specializations from the list.
     *
     * @param array $specializations
     * @param int $count
     * @return array
     */
    private function getRandomSpecializations(array $specializations, int $count): array
    {
        // Shuffle the specializations array and return the first $count items
        shuffle($specializations);
        return array_slice($specializations, 0, $count);
    }

}
