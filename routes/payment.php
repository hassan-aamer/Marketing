<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'Payment'], function () {
        Route::controller(\App\Http\Controllers\Api\Payment\PaymentController::class)->group(function () {
            Route::post('/create', 'create');
        });
    });
});
