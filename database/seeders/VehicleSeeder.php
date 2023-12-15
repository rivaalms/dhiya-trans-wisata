<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
   private $vehicles = [
      [
         'name' => 'Big Bus',
         'slug' => 'big-bus',
         'capacity' => '47 - 59',
      ],
      [
         'name' => 'Medium Bus',
         'slug' => 'medium-bus',
         'capacity' => '27 - 35'
      ],
      [
         'name' => 'HiAce Premio Luxury',
         'slug' => 'hiace-premio-luxury',
         'capacity' => '9'
      ],
      [
         'name' => 'HiAce Premio Standar',
         'slug' => 'hiace-premio-standar',
         'capacity' => '12'
      ],
      [
         'name' => 'HiAce Commuter',
         'slug' => 'hiace-commuter',
         'capacity' => '13'
      ],
      [
         'name' => 'Toyota Innova Reborn',
         'slug' => 'toyota-innova-reborn',
         'capacity' => '7'
      ],
      [
         'name' => 'Avanza/Xenia TSS',
         'slug' => 'avanza-xenia-tss',
         'capacity' => '7'
      ],
   ];

   public function run(): void
   {
      foreach ($this->vehicles as $v) {
         Vehicle::factory()->create($v);
      }
   }
}
