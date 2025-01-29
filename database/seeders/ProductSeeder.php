<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slug = Str::slug('Accessory 1');

        // Check if the slug already exists, and modify it if necessary
        if (DB::table('accessories')->where('slug', $slug)->exists()) {
            $slug .= '-' . time(); // Append a unique timestamp
        }

        DB::table('accessories')->insert([
            [
                'category_id' => 3,
                'name' => 'Accessory 1',
                'slug' => $slug,
                'status' => 0,
                'price' => 155,
                'discount_price' => 203,
                'start_date' => '2024-12-18 06:24:40',
                'end_date' => '2025-02-06 06:24:40',
                'stock' => 74,
                'description' => 'Description for accessory 1',
                'image' => 'images/accessory1.jpg',
                'image_url' => 'https://example.com/images/accessory1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
