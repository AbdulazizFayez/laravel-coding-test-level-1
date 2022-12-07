<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/vi/event/active-events', [EventController::class, 'getActiveEvents']);
Route::get('events', [EventController::class, 'index']);
Route::post('events', [EventController::class, 'store']);

Route::post('event_update/{id}', [EventController::class, 'update']);

Route::get('events/{id}/edit', [EventController::class, 'edit']);
Route::get('events/create', [EventController::class, 'create']);
Route::get('events/{id}', [EventController::class, 'show']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
