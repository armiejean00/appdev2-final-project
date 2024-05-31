<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $locations = [
            'Cafeteria',
            'Gazebo',
            'Room',
            'Library',
            'OSAS',
            'Highway',
            'Canteen',
        ];

         foreach ($locations as $location) {
            Location::create(['name' => $location]);
        }
    }
}
