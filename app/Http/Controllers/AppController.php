<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Image;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
   public function landing()
   {
      $products = Vehicle::all()->take(3);

      foreach ($products as $p) {
         $p->image = Image::where('vehicle_uuid', $p->uuid)->where('is_cover', true)->first()?->path;
      }

      return Inertia::render('landing', compact('products'));
   }

   public function products()
   {
      $query = Vehicle::all();
      foreach ($query as $q) {
         $q->image = Image::where('vehicle_uuid', $q->uuid)->first();
      }
      $products = VehicleController::orderVehicles($query);
      return Inertia::render('products', compact('products'));
   }

   public function productDetails(String $slug)
   {
      $query = Vehicle::where('slug', $slug)->get();
      if (!count($query)) return abort('404');
      $product = VehicleController::mapVehicles($query)->first();

      return Inertia::render('vehicle', compact('product'));
   }
}
