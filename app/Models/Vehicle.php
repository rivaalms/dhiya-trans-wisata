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
}
