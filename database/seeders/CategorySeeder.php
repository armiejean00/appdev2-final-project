<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Textbooks',
            'School Supplies',
            'Library Books',
            'School Forms',
            'Educational Toys',
            'Art Supplies',
            'Sports Equipment',
            'Tech Devices',
        ];

        // Insert categories into the database
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
         
    }
}