<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         // Disable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');

         // Truncate tables
         DB::table('cart_items')->truncate();
         DB::table('orders')->truncate();
         DB::table('shooping_carts')->truncate();
         DB::table('notifications')->truncate();
         DB::table('products')->truncate();
         DB::table('product_catagories')->truncate();
         DB::table('artisans')->truncate();
         DB::table('customers')->truncate();
         DB::table('users')->truncate();


        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([
            UsersTableSeeder::class,
            CustomersTableSeeder::class,
            ArtisansTableSeeder::class,
            ProductCategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            OrdersTableSeeder::class,
            ShoppingCartsTableSeeder::class,
            CartItemsTableSeeder::class,
            NotificationsTableSeeder::class,
            // Add other seeders here if needed
        ]);
    }
}
