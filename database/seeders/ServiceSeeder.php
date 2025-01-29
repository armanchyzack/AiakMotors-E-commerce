<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 2) as $index) {
            DB::table('services')->insert([
                'name' => 'Service ' . $index,
                'image' => 'images/service' . $index . '.jpg', // Placeholder image path
                'price' => rand(50, 500), // Random price between 50 and 500
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
