<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::/* middleware('auth')-> */prefix('admin')->group(function() {
   Route::get('/products', [ApiController::class, 'getProducts']);
   Route::get('/destinations', [ApiController::class, 'getDestinations']);
   Route::get('/prices', [ApiController::class, 'getPrices']);

   Route::post('/products', [ApiController::class, 'postProducts']);
   Route::put('/products/{uuid}', [ApiController::class, 'putProducts']);
   Route::delete('/products/{uuid}', [ApiController::class, 'deleteProducts']);

   Route::post('/destinations', [ApiController::class, 'postDestinations']);
   Route::put('/destinations/{uuid}', [ApiController::class, 'putDestinations']);
   Route::delete('/destinations/{uuid}', [ApiController::class, 'deleteDestinations']);
});