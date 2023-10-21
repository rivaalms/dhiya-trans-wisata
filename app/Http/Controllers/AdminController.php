<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function login() {
      return Inertia::render('admin/login');
   }

   public function dashboard() {
      // dd(Auth::user());
      return Inertia::render('admin/dashboard');
   }
}
