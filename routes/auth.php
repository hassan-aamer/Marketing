<?php

use Illuminate\Support\Facades\Route;
//gfdss
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
