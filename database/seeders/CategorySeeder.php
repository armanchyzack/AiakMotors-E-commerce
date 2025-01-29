<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title' => 'Electronics', 'slug' => Str::slug('Electronics'), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Fashion', 'slug' => Str::slug('Fashion'), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Home & Garden', 'slug' => Str::slug('Home & Garden'), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Automotive', 'slug' => Str::slug('Automotive'), 'created_at' => now(), 'updated_at' => now()],
            
        ]);
    }
}
