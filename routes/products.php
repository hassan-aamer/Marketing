<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'Products'], function () {
    Route::controller(\App\Http\Controllers\Api\Products\ProductController::class)->group(function () {
        Route::post('/create', 'create')->middleware('auth:sanctum');
        Route::post('/update/{id}', 'update')->middleware('auth:sanctum');
        Route::get('/allProducts', 'allProducts')->middleware('auth:sanctum');
        Route::get('/Activated', 'index');
        Route::get('/One/Product/{id}', 'show');
        Route::delete('/delete/{id}', 'delete')->middleware('auth:sanctum');
    });
});

