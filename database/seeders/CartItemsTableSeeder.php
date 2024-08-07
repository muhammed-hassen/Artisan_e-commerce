<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Retrieve cart IDs and product IDs
        $cartIds = DB::table('shooping_carts')->pluck('cart_id');
        $productIds = DB::table('products')->pluck('product_id');

        // Check if there are any carts and products to avoid errors
        if ($cartIds->isEmpty() || $productIds->isEmpty()) {
            Log::warning('No carts or products found to seed cart items.');
            return;
        }

        // Define sample cart item data
        $cartItems = [
            ['cart_id' => $cartIds->random(), 'product_id' => $productIds->random(), 'quantity' => 1],
            ['cart_id' => $cartIds->random(), 'product_id' => $productIds->random(), 'quantity' => 2],
            ['cart_id' => $cartIds->random(), 'product_id' => $productIds->random(), 'quantity' => 1],
            ['cart_id' => $cartIds->random(), 'product_id' => $productIds->random(), 'quantity' => 3],
            ['cart_id' => $cartIds->random(), 'product_id' => $productIds->random(), 'quantity' => 2],
        ];

        // Insert sample data into the 'cart_items' table
        foreach ($cartItems as $item) {
            DB::table('cart_items')->insert([
                'cart_id' => $item['cart_id'],
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
