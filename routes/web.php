<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LinkController;
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

    Route::resource('links', LinkController::class)->except(['create']);
    Route::get('links/create/{dashboard}', [LinkController::class, 'create'])->name('links.create');
});

require __DIR__.'/auth.php';
