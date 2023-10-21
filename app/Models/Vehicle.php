<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
   use HasFactory;

   protected $guarded = ['id'];
   protected $hidden = ['id'];

   public function destinations()
   {
      return $this->belongsToMany(Destination::class, 'prices', 'vehicle_uuid', 'destination_uuid', 'uuid', 'uuid')->withPivot('price', 'duration');
   }

   public function images() {
      return $this->hasMany(Image::class, 'vehicle_uuid', 'uuid');
   }

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
}
