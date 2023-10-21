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
      // \App\Models\User::factory(10)->create();

      // \App\Models\User::factory()->create([
      //     'name' => 'Test User',
      //     'email' => 'test@example.com',
      // ]);

      Vehicle::factory(10)->create();
      Destination::factory(10)->create();

      $vehicle = Vehicle::select('uuid')->get();
      $destination = Destination::select('uuid')->get();

      for ($i = 0; $i < 50; $i++) {
         Price::factory(1)->create([
            'vehicle_uuid' => $vehicle[mt_rand(0, 9)]->uuid,
            'destination_uuid' => $destination[mt_rand(0, 9)]->uuid
         ]);
         Image::factory(1)->create([
            'vehicle_uuid' => $vehicle[mt_rand(0, 9)]->uuid,
         ]);
      }
   }
}
