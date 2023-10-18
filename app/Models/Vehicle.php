<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
   use HasFactory;

   protected $guarded = ['id'];

   public function destinations()
   {
      return $this->belongsToMany(Destination::class, 'prices', 'destination_id', 'vehicle_id')->withPivot('price', 'duration');
   }

   public static function mapVehicles($data)
   {
      $result = $data->map(fn ($item) => [
         'id' => $item->id,
         'name' => $item->name,
         'slug' => $item->slug,
         'capacity' => $item->capacity,
         'price' => $item->price,
         'image' => $item->image,
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
}
