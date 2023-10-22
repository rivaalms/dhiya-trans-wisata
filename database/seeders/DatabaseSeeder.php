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

      \App\Models\User::factory()->create([
         'name' => 'Admin',
         'email' => 'admin@example.com',
      ]);

      // Vehicle::factory(10)->create();
      Vehicle::factory()->create([
         'name' => 'Hiace Premio Luxury',
         'slug' => 'hiace-premio-luxury',
         'capacity' => 9,
      ]);
      Vehicle::factory()->create([
         'name' => 'Toyota Innova Reborn',
         'slug' => 'toyota-innova-reborn',
         'capacity' => 7,
      ]);
      Vehicle::factory()->create([
         'name' => 'Medium Bus',
         'slug' => 'medium-bus',
         'capacity' => 33
      ]);
      Destination::factory(10)->create();

      $vehicle = Vehicle::select('uuid')->get();
      $destination = Destination::select('uuid')->get();

      Image::factory()->create([
         'vehicle_uuid' => $vehicle[0]->uuid,
         'path' => env('APP_URL') . "/storage/img/hiace-luxury.jpg"
      ]);
      Image::factory()->create([
         'vehicle_uuid' => $vehicle[1]->uuid,
         'path' => env('APP_URL') . "/storage/img/innova-reborn.jpg"
      ]);
      Image::factory()->create([
         'vehicle_uuid' => $vehicle[2]->uuid,
         'path' => env('APP_URL') . "/storage/img/medium-bus.jpg"
      ]);

      for ($i = 0; $i < 12; $i++) {
         Price::factory(1)->create([
            'vehicle_uuid' => $vehicle[mt_rand(0, 2)]->uuid,
            'destination_uuid' => $destination[mt_rand(0, 2)]->uuid
         ]);
         Image::factory(1)->create([
            'vehicle_uuid' => $vehicle[mt_rand(0, 2)]->uuid,
         ]);
      }
   }
}
