<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rooms', [App\Http\Controllers\Rooms\Api\RoomsController::class,'index']);
Route::get('/rooms/{id}', [App\Http\Controllers\Rooms\Api\RoomsController::class,'detailRoom']);
Route::post('/rooms/createRoom', [App\Http\Controllers\Rooms\Api\RoomsController::class,'createRoom']);
Route::post('/rooms/editRoom', [App\Http\Controllers\Rooms\Api\RoomsController::class,'editRoom']);
Route::delete('/rooms/{id}', [App\Http\Controllers\Rooms\Api\RoomsController::class,'deleteRoom']);

