<?php

namespace Database\Factories;
use App\Models\Item;
use App\Models\Location;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'location_id' => Location::factory(),
            'category_id' => Category::factory(),
            'users_id' => $this->faker->optional()->randomElement([User::factory(), null]), 
            'datefound' => $this->faker->date(),
            'status' => $this->faker->randomElement(['0', '0']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}