<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Retrieve artisan IDs and category IDs
        $artisanIds = DB::table('artisans')->pluck('artisan_id');
        $categoryIds = DB::table('product_catagories')->pluck('catagory_id');

        // Check if there are any artisans and categories to avoid errors
        if ($artisanIds->isEmpty() || $categoryIds->isEmpty()) {
            Log::warning('No artisans or categories found to seed products.');
            return;
        }

        // Define sample product data
        $products = [
            ['Handwoven Textiles', 'Handwoven fabric with traditional patterns.', 'image1.jpg', 100.00, 10],
            ['Jewelry', 'Elegant silver jewelry with intricate designs.', 'image2.jpg', 50.00, 20],
            ['Pottery', 'Handcrafted pottery with unique designs.', 'image3.jpg', 30.00, 15],
            ['Wood Carvings', 'Beautifully carved wooden sculptures.', 'image4.jpg', 150.00, 5],
            ['Baskets and Handicrafts', 'Handwoven baskets for various uses.', 'image5.jpg', 20.00, 25],
            ['Coffee Accessories', 'Traditional coffee accessories.', 'image6.jpg', 25.00, 30],
            ['Leather Goods', 'Handcrafted leather bags and belts.', 'image7.jpg', 75.00, 12],
            ['Art', 'Original paintings by local artists.', 'image8.jpg', 200.00, 8],
        ];

        // Insert sample data into the 'products' table
        foreach ($products as $product) {
            DB::table('products')->insert([
                'artisan_id' => $artisanIds->random(), // Random artisan_id from the artisans table
                'product_name' => $product[0],
                'description' => $product[1],
                'image' => json_encode([$product[2]]), // Store image as JSON
                'price' => $product[3],
                'stock_quantity' => $product[4],
                'catagory_id' => $categoryIds->random(), // Random catagory_id from the product_categories table
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
