<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //DB::table('users')->truncate(); // Remove all records

        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'gender' => true, // assuming true for male, false for female
                'address' => '123 Main St, Bole, AA',
                'email' => 'john.doe@example.com',
                'email_verified_at' => now(),
                'username' => 'john',
                'password' => Hash::make('password123'), // Hash passwords for security
                'role' => 1, // Assuming 1 is Customer
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Smith',
                'last_name' => 'row',
                'gender' => false, // assuming false for female
                'address' => '456 Oak St, Merkato, AA',
                'email' => 'jane.smith@example.com',
                'email_verified_at' => now(),
                'username' => 'smith',
                'password' => Hash::make('password123'), // Hash passwords for security
                'role' => 0, // Assuming 0 is Admin
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Abel',
                'last_name' => 'Sisay',
                'gender' => false, // assuming false for female
                'address' => '457 Oak St, Merkato, AA',
                'email' => 'abel.sisay@example.com',
                'email_verified_at' => now(),
                'username' => 'abel',
                'password' => Hash::make('password123'), // Hash passwords for security
                'role' => 2, // Assuming 2 is Artisan
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            

            // Add more users as needed
        ]);
    }
}
