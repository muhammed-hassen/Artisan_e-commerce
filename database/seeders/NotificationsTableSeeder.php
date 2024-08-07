<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Retrieve artisan IDs
        $artisanIds = DB::table('artisans')->pluck('artisan_id');

        // Check if there are any artisans to avoid errors
        if ($artisanIds->isEmpty()) {
            Log::warning('No artisans found to seed notifications.');
            return;
        }

        // Define sample notification data
        $notifications = [
            ['message' => 'Your product has been approved.', 'is_read' => false],
            ['message' => 'New order placed for your product.', 'is_read' => true],
            ['message' => 'Your profile has been updated.', 'is_read' => false],
            ['message' => 'You have a new message from a customer.', 'is_read' => true],
            ['message' => 'Reminder: Update your shop details.', 'is_read' => false],
        ];

        // Insert sample data into the 'notifications' table
        foreach ($notifications as $notification) {
            DB::table('notifications')->insert([
                'artisan_id' => $artisanIds->random(), // Random artisan_id from the artisans table
                'message' => $notification['message'],
                'is_read' => $notification['is_read'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
