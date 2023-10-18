<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppController extends Controller
{
   public function landing()
   {
      $products = Vehicle::all()->take(3);

      foreach ($products as $p) {
         $p->destinations;
      }

      return Inertia::render('landing', compact('products'));
   }
}
