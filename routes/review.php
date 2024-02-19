<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'Review'], function () {
        Route::controller(\App\Http\Controllers\Api\Review\ReviewController::class)->group(function () {
            //
        });
    });
});
