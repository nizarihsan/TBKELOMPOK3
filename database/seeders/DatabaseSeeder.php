<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AuctionItem;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
        ]);

        // Check if the user already exists
        $user = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
        ]);

        // Create sample active auction items
        AuctionItem::create([
            'name' => 'Antique Vase',
            'description' => 'A beautiful antique vase from the 19th century.',
            'image_url' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHByb3BlcnR5fGVufDB8fDB8fHww',
            'starting_price' => 100.00,
            'price' => 100.00,
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        AuctionItem::create([
            'name' => 'Vintage Watch',
            'description' => 'A classic vintage watch in excellent condition.',
            'image_url' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHByb3BlcnR5fGVufDB8fDB8fHww',
            'starting_price' => 250.00,
            'price' => 100.00,
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        AuctionItem::create([
            'name' => 'Rare Coin',
            'description' => 'A rare coin from the Roman Empire.',
            'image_url' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHByb3BlcnR5fGVufDB8fDB8fHww',
            'starting_price' => 500.00,
            'price' => 100.00,
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        // Adding new auction items
        AuctionItem::create([
            'name' => 'Modern Art Painting',
            'description' => 'A stunning modern art piece by a renowned artist.',
            'image_url' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHByb3BlcnR5fGVufDB8fDB8fHww',
            'starting_price' => 750.00,
            'price' => 100.00,
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        AuctionItem::create([
            'name' => 'Collectible Stamp Set',
            'description' => 'A rare set of collectible stamps from around the world.',
            'image_url' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHByb3BlcnR5fGVufDB8fDB8fHww',
            'starting_price' => 300.00,
            'price' => 100.00,
            'status' => 'active',
            'user_id' => $user->id,
        ]);
    }
}
