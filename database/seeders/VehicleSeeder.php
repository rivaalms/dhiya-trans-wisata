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
      ]
   ];

   public function run(): void
   {
      foreach ($this->vehicles as $v) {
         Vehicle::factory()->create($v);
      }
   }
}
