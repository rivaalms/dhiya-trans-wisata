<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
