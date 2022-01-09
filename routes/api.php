<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// List tickets
Route::get('tickets', 'App\Http\Controllers\TicketController@index');

// List singl ticket
Route::get('ticket/{id}', 'App\Http\Controllers\TicketController@store');

 // Create new ticket
Route::post('ticket', 'App\Http\Controllers\TicketController@store');

// Update ticket
Route::put('ticket', 'App\Http\Controllers\TicketController@store');

// Delete ticket
Route::delete('ticket/{id}', 'App\Http\Controllers\TicketController@destroy');
