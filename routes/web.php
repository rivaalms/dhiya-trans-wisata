<?php

use App\Http\Controllers\AppController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

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