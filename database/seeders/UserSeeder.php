<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\AuctionItem;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin', // Set role to admin
            ],
            [
                'name' => 'User One',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User Three',
                'email' => 'user3@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User Four',
                'email' => 'user4@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User Five',
                'email' => 'user5@example.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            // Check if the user already exists
            if (!User::where('email', $user['email'])->exists()) {
                User::create($user);
            }
        }

        // Adding auction items with a default category_id and brand
        $auctionItems = [
            [
                'name' => 'Antique Vase',
                'description' => 'A beautiful antique vase from the 19th century.',
                'image_url' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHByb3BlcnR5fGVufDB8fDB8fHww',
                'starting_price' => 100,
                'status' => 'active',
                'user_id' => 1, // Assuming the first user created has ID 1
                'category_id' => 1, // Default category ID
                'brand' => 'Antique Brand', // Adding a default brand
            ],
            // Add more auction items as needed
        ];

        foreach ($auctionItems as $item) {
            // Insert auction items
            AuctionItem::create($item);
        }
    }
}
