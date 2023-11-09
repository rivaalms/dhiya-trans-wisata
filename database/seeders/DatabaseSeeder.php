<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Destination;
use App\Models\Image;
use App\Models\Price;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    */
   public function run(): void
   {
      $this->call([
         VehicleSeeder::class,
         DestinationSeeder::class,
         ImageSeeder::class,
         PriceSeeder::class,
         UserSeeder::class
      ]);
   }
}
