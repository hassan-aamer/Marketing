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

//-----------------------------------Start Auth------------------------------------
Route::post('/Register', [App\Http\Controllers\Api\Auth\AuthController::class, 'createUser']);
Route::post('/login', [App\Http\Controllers\Api\Auth\AuthController::class, 'loginUser']);
Route::post('/logout', [App\Http\Controllers\Api\Auth\AuthController::class, 'logout']);
Route::post('/update/{id}', [App\Http\Controllers\Api\Auth\AuthController::class, 'update']);
Route::get('/allUsers', [App\Http\Controllers\Api\Auth\AuthController::class, 'allUsers']);
Route::get('/delete/{id}', [App\Http\Controllers\Api\Auth\AuthController::class, 'delete']);
//-----------------------------------End Auth--------------------------------------


//-----------------------------------Start Products--------------------------------

//-----------------------------------End Products----------------------------------


//-----------------------------------Start Offers----------------------------------

//-----------------------------------End Offers------------------------------------


//-----------------------------------Start Review----------------------------------

//-----------------------------------End Review------------------------------------
