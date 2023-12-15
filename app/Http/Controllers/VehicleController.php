<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
   public static function mapVehicles($data)
   {
      $images = Image::where('vehicle_uuid', $data->first()->uuid)->get()->setHidden(['vehicle_uuid', 'id']);

      $result = $data->map(fn ($item) => [
         'uuid' => $item->uuid,
         'name' => $item->name,
         'slug' => $item->slug,
         'capacity' => $item->capacity,
         'price' => $item->price,
         'images' => $images,
         'created_at' => $item->created_at,
         'updated_at' => $item->updated_at,
         'price_by_destination' => $item->destinations->map(fn ($destination) => [
            'destination' => $destination->name,
            'days' => $destination->pivot->duration,
            'price' => $destination->pivot->price,
         ]),
      ]);

      return collect(json_decode(json_encode($result), false));
   }

   public static function orderVehicles($_data)
   {
      $_order = [
         'big-bus',
         'medium-bus',
         'hiace-premio-luxury',
         'hiace-premio-standar',
         'hiace-commuter',
         'toyota-innova-reborn',
         'avanza-xenia-tss'
      ];

      $data = $_data->toArray();

      usort($data, function ($a, $b) use ($_order) {
         $keyA = array_search($a['slug'], $_order);
         $keyB = array_search($b['slug'], $_order);

         return $keyA - $keyB;
      });

      return $data;
   }
}
