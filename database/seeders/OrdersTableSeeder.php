<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Retrieve customer IDs and product IDs
         $customerIds = DB::table('customers')->pluck('customer_id');
         $productIds = DB::table('products')->pluck('product_id');
 
         // Check if there are any customers and products to avoid errors
         if ($customerIds->isEmpty() || $productIds->isEmpty()) {
             Log::warning('No customers or products found to seed orders.');
             return;
         }
 
         // Define sample order data
         $orders = [
             ['unit_price' => 100.00, 'quantity' => 2, 'status' => true, 'ordered_date' => now()->subDays(10)],
             ['unit_price' => 50.00, 'quantity' => 1, 'status' => true, 'ordered_date' => now()->subDays(5)],
             ['unit_price' => 30.00, 'quantity' => 3, 'status' => false, 'ordered_date' => now()->subDays(3)],
             ['unit_price' => 150.00, 'quantity' => 1, 'status' => true, 'ordered_date' => now()->subDays(7)],
             ['unit_price' => 20.00, 'quantity' => 5, 'status' => false, 'ordered_date' => now()->subDays(1)],
         ];
 
         // Insert sample data into the 'orders' table
         foreach ($orders as $order) {
             DB::table('orders')->insert([
                 'customer_id' => $customerIds->random(), // Random customer_id from the customers table
                 'product_id' => $productIds->random(),   // Random product_id from the products table
                 'unit_price' => $order['unit_price'],
                 'quantity' => $order['quantity'],
                 'status' => $order['status'],
                 'ordered_date' => $order['ordered_date'],
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);
         }
    }
}
