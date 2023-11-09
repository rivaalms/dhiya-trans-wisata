<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $vehicles = Vehicle::select('uuid', 'slug')->distinct('uuid')->get();

      foreach ($vehicles as $v) {
         $seed = null;

         switch ($v->slug) {
            case 'luxury-bus':
               $seed = [
                  [
                     'vehicle_uuid' => $v->uuid,
                     'path' => env('APP_URL') . '/storage/img/bus-1.jpg',
                     'is_cover' => true
                  ],
                  [
                     'vehicle_uuid' => $v->uuid,
                     'path' => env('APP_URL') . '/storage/img/bus-2.jpg',
                  ],
                  [
                     'vehicle_uuid' => $v->uuid,
                     'path' => env('APP_URL') . '/storage/img/bus-3.jpg',
                  ],
               ];
               break;
            default:
               $seed = [
                  [
                     'vehicle_uuid' => $v->uuid
                  ]
               ];
               break;
         }

         foreach ($seed as $s) {
            Image::factory()->create($s);
         }
      }
   }
}
