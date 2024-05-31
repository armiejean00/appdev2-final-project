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
        // Array of categories for lost and found items
        $categories = [
            'Electronics',
            'Clothing',
            'Accessories',
            'Books',
            'Documents',
            'Jewelry',
            'Toys',
            'Tools',
            'Sporting Goods',
            'Miscellaneous'
        ];

        // Insert categories into the database
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
         
    }
}