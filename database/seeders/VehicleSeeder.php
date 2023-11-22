<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
   private $vehicles = [
      [
         'name' => 'Hiace Premio Luxury',
         'slug' => 'hiace-premio-luxury',
         'capacity' => 9,
      ],
      [
         'name' => 'Toyota Innova Reborn',
         'slug' => 'toyota-innova-reborn',
         'capacity' => 7
      ],
      [
         'name' => 'Luxury Bus',
         'slug' => 'luxury-bus',
         'capacity' => 59
      ],
      [
         'name' => 'Bus 35 Seat',
         'slug' => 'bus-35-seat',
         'capacity' => 35
      ],
      [
         'name' => 'Toyota Fortuner',
         'slug' => 'toyota-fortuner',
         'capacity' => 7
      ],
      [
         'name' => 'Elf Long',
         'slug' => 'elf-long',
         'capacity' => 18
      ],
      [
         'name' => 'Toyota Alphard',
         'slug' => 'toyota-alphard',
         'capacity' => 7
      ]
   ];

   public function run(): void
   {
      foreach ($this->vehicles as $v) {
         Vehicle::factory()->create($v);
      }
   }
}
