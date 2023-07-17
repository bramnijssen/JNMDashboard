<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::inertia('/', 'Dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('activities', ActivityController::class);
    Route::inertia('links', 'Links')->name('links');
});

require __DIR__.'/auth.php';
