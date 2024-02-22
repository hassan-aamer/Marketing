<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'Auth'], function () {
    Route::controller(\App\Http\Controllers\Api\Auth\AuthController::class)->group(function () {
        Route::post('/Register', 'createUser')->middleware('auth:sanctum');
        Route::post('/login', 'loginUser');
        Route::post('/logout', 'logout');
        Route::post('/update/{id}', 'update')->middleware('auth:sanctum');
        Route::get('/allUsers', 'allUsers')->middleware('auth:sanctum');
        Route::delete('/delete/{id}', 'delete')->middleware('auth:sanctum');
        Route::get('/show/{id}', 'show')->middleware('auth:sanctum');
    });
});
