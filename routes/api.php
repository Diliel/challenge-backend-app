<?php

use App\Http\Controllers\Challenge\Airline\AirlineController;
use App\Http\Controllers\Challenge\Ticket\TicketController;
use App\Http\Controllers\Core\Auth\UserController;
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
/* Rutas Airline */

Route::get("airline/index", [AirlineController::class, 'index']);
Route::get("airline/show/{id}", [AirlineController::class, 'show']);

/* Rutas Ticket */

Route::get("ticket/index", [TicketController::class, 'index']);
Route::get("ticket/show/{id}", [TicketController::class, 'show']);

/* Rutas User */

Route::get("user/index", [UserController::class, 'index']);
Route::get("user/show/{id}", [UserController::class, 'show']);
