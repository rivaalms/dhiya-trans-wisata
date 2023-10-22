<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppController::class, 'landing'])->name('landing');
Route::get('/about', fn () => Inertia::render('about'));
Route::get('/contacts', fn () => Inertia::render('contacts'));
Route::get('/products', [AppController::class, 'products']);
Route::get('/products/{slug}', [AppController::class, 'productDetails']);

Route::prefix('admin')->group(function() {
   Route::get('/login', [AdminController::class, 'login'])->name('login');
   Route::post('/login-handle', [UserController::class, 'login']);

   Route::middleware('auth')->group(function() {
      Route::get('/dashboard', [AdminController::class, 'dashboard']);
      Route::get('/products', [AdminController::class, 'products']);
      Route::get('/destinations', [AdminController::class, 'destinations']);
      Route::get('/prices', [AdminController::class, 'prices']);
   });
});