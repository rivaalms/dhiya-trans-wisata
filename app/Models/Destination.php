<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
   use HasFactory;

   protected $guarded = ['id'];

   public function vehicles()
   {
      return $this->belongsToMany(Vehicle::class, 'price', 'vehicle_id', 'destination_id')->withPivot('price', 'duration');
   }
}
