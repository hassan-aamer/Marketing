<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'Offers'], function () {
    Route::controller(\App\Http\Controllers\Api\offers\offerController::class)->group(function () {
        Route::post('/create', 'create')->middleware('auth:sanctum');
        Route::post('/update/{id}', 'update')->middleware('auth:sanctum');
        Route::get('/all/Offers', 'allOffers')->middleware('auth:sanctum');
        Route::get('/Activated', 'index');
        Route::get('/One/Offer/{id}', 'show');
        Route::delete('/delete/{id}', 'delete')->middleware('auth:sanctum');
    });
});

