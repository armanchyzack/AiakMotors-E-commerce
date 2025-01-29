<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 2) as $index) {
            // Fetch category IDs from the categories table
            $categoryIds = DB::table('categories')->pluck('id')->toArray();

            // Ensure category_id is selected randomly from the actual category IDs
            $categoryId = $categoryIds[array_rand($categoryIds)];

            // Generate a unique slug for each accessory by appending a random number
            $slug = Str::slug('Accessory ' . $index) . '-' . rand(1000, 9999); // Appending a random number to avoid duplicates

            DB::table('accessories')->insert([
                'category_id' => $categoryId, // Randomly selected category ID
                'name' => 'Accessory ' . $index,
                'slug' => $slug, // Unique slug
                'status' => rand(0, 1), // Random 0 or 1 for active/inactive status
                'price' => rand(50, 1000), // Random price between 50 and 1000
                'price' => 'In Stock', // Random price between 50 and 1000
                'discount_price' => rand(10, 500), // Random discount price
                'start_date' => now()->subDays(rand(1, 30)), // Random start date within the last 30 days
                'end_date' => now()->addDays(rand(1, 30)), // Random end date in the future
                'stock' => rand(1, 100), // Random stock quantity
                'description' => 'Description for accessory ' . $index,
                'image' => 'images/accessory' . $index . '.jpg', // Placeholder image path
                'image_url' => 'https://example.com/images/accessory' . $index . '.jpg', // Placeholder URL
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
