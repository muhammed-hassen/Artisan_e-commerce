<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CustomersTableSeeder extends Seeder
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
            Log::warning('No users found to seed customers.');
            return;
        }

         // Define interests aligned with product types
        // Define product types
        $intersetes = [
            'Handwoven Textiles',
            'Jewelry',
            'Pottery',
            'Wood Carvings',
            'Baskets and Handicrafts',
            'Coffee Accessories',
            'Leather Goods',
            'Art',
        ];

        // Insert sample data into the 'customers' table
       // DB::table('customers')->truncate(); // Remove all records
        foreach ($userIds as $userId) {
            // Randomly select two unique product types
            $selectedTypes = $this->getRandomProductTypes($intersetes, 2);
            DB::table('customers')->insert([
                'customer_id' => $userId, // Assuming 'customer_id' references 'user_id'
                'interests' => json_encode(['technology', 'sports']), // Example interests
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Get a specified number of random unique product types from the list.
     *
     * @param array $productTypes
     * @param int $count
     * @return array
     */
    private function getRandomProductTypes(array $intersetes, int $count): array
    {
        // Shuffle the product types array and return the first $count items
        shuffle($intersetes);
        return array_slice($intersetes, 0, $count);
    }
}
