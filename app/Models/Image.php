<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   use HasFactory;

   protected $guarded = ['id'];
   protected $hidden = ['id'];
   protected $casts = [
      'is_cover' => 'boolean'
   ];

   public function vehicle() {
      return $this->belongsTo(Vehicle::class, 'vehicle_uuid', 'uuid');
   }
}
