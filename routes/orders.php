<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'Orders'], function () {
        Route::controller(\App\Http\Controllers\Api\Orders\OrderController::class)->group(function () {
            Route::post('/create', 'create');
            Route::get('/all', 'index');
            Route::get('/show/{id}', 'show');
            Route::delete('/delete/{id}', 'delete');
        });
    });
});
