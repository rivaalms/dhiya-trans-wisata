<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Price;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Casts\Json;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function login()
   {
      return Inertia::render('admin/login');
   }

   public function dashboard()
   {
      // dd(Auth::user());
      return Inertia::render('admin/dashboard');
   }

   public function products()
   {
      // $products = Vehicle::paginate(5)->withQueryString();
      return Inertia::render('admin/products'/* , compact('products') */);
   }

   public function destinations()
   {
      return Inertia::render('admin/destinations');
   }

   public function prices()
   {
      return Inertia::render('admin/prices');
   }
}
