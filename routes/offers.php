<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'Offers'], function () {
        Route::controller(\App\Http\Controllers\Api\offers\offerController::class)->group(function () {
            Route::post('/create', 'create');
            Route::post('/update/{id}', 'update');
            Route::get('/all/Offers', 'allOffers');
            Route::get('/Activated', 'index');
            Route::get('/One/Offer/{id}', 'show');
            Route::delete('/delete/{id}', 'delete');
        });
    });
});
