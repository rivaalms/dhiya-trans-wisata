<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Price;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $vehicles = Vehicle::select('uuid')->distinct('uuid')->get();
      $destinations = Destination::select('uuid')->distinct('uuid')->get();

      foreach ($vehicles as $v) {
         foreach ($destinations as $d) {
            Price::factory()->create([
               'vehicle_uuid' => $v->uuid,
               'destination_uuid' => $d->uuid
            ]);
         }
      }
   }
}
