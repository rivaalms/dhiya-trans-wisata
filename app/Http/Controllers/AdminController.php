<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function login() {
      return Inertia::render('admin/login');
   }
}
