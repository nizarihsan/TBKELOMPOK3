<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Antiques',
                'description' => 'Antique items and collectibles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Art',
                'description' => 'Paintings and artwork',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more categories as needed
        ]);
    }
}
