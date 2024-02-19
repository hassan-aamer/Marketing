<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'Contact'], function () {
        Route::controller(\App\Http\Controllers\Api\Contact\ContactController::class)->group(function () {
            Route::post('/update/{id}', 'update');
            Route::get('/show/{id}', 'show');
        });
    });
});
