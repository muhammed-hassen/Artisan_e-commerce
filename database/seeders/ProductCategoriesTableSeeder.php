<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Define the product categories
        $categories = [
            'Handwoven Textiles',
            'Jewelry',
            'Pottery',
            'Wood Carvings',
            'Baskets and Handicrafts',
            'Coffee Accessories',
            'Leather Goods',
            'Art',
        ];

        // Insert sample data into the 'product_categories' table
        foreach ($categories as $category) {
            DB::table('product_catagories')->insert([
                'category_name' => $category, // Category name
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
