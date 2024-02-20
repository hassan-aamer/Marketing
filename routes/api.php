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

Route::group(['prefix' => 'Auth'], function () {
    Route::controller(\App\Http\Controllers\Api\Auth\AuthController::class)->group(function () {
        Route::post('/Register', 'createUser');
        Route::post('/login', 'loginUser');
        Route::post('/logout', 'logout');
        Route::post('/update/{id}', 'update');
        Route::get('/allUsers', 'allUsers');
        Route::delete('/delete/{id}', 'delete');
        Route::get('/show/{id}', 'show');
    });
});
