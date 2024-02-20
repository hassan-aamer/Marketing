<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'Products'], function () {
        Route::controller(\App\Http\Controllers\Api\Products\ProductController::class)->group(function () {
            Route::post('/create', 'create');
            Route::post('/update/{id}', 'update');
            Route::get('/allProducts', 'allProducts');
            Route::get('/Activated', 'index');
            Route::get('/One/Product/{id}', 'show');
            Route::delete('/delete/{id}', 'delete');
        });
    });
// });
