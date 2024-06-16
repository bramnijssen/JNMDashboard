<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

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

Route::get('weather', [WeatherController::class, 'index']);
Route::get('news', [NewsController::class, 'index']);
Route::get('activities', [ActivityController::class, 'getCurrentActivities']);
Route::get('links', [LinkController::class, 'getAllLinks']);
