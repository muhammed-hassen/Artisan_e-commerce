<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShoppingCartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Retrieve customer IDs
        $customerIds = DB::table('customers')->pluck('customer_id');

        // Check if there are any customers to avoid errors
        if ($customerIds->isEmpty()) {
            Log::warning('No customers found to seed shopping carts.');
            return;
        }

        // Define sample cart data
        $carts = [
            ['checkout' => false],
            ['checkout' => true],
            ['checkout' => false],
            ['checkout' => true],
            ['checkout' => false],
        ];

        // Insert sample data into the 'shopping_carts' table
        foreach ($carts as $cart) {
            DB::table('shooping_carts')->insert([
                'customer_id' => $customerIds->random(), // Random customer_id from the customers table
                'checkout' => $cart['checkout'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
