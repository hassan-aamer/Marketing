<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//=============================================Auth======================================
Route::controller(\App\Http\Controllers\Api\Auth\AuthController::class)->group(function () {
    Route::post('/Register', 'createUser');
    Route::post('/login', 'loginUser');
    Route::post('/logout', 'logout');
    Route::post('/update/{id}', 'update');
    Route::get('/allUsers', 'allUsers');
    Route::get('/delete/{id}', 'delete');
    Route::get('/show/{id}', 'show');
});
Route::middleware('auth:sanctum')->group(function () {

    //=============================================Products===================================
    Route::group(['prefix' => 'Products'], function () {
        Route::controller(\App\Http\Controllers\Api\Products\ProductController::class)->group(function () {
            Route::post('/create', 'create');
            Route::post('/update/{id}', 'update');
            Route::get('/allProducts', 'allProducts');
            Route::get('/Activated', 'index');
            Route::get('/One/Product/{id}', 'show');
            Route::get('/delete/{id}', 'delete');
        });
    });
    //=============================================About======================================
    Route::group(['prefix' => 'About'], function () {
        Route::controller(\App\Http\Controllers\Api\About\AboutController::class)->group(function () {
            Route::post('/update/{id}', 'update');
        });
    });
    //=============================================Offers======================================
    Route::group(['prefix' => 'Offers'], function () {
        Route::controller(\App\Http\Controllers\Api\Offers\offerController::class)->group(function () {
            //
        });
    });
    //=============================================Review======================================
    Route::group(['prefix' => 'Review'], function () {
        Route::controller(\App\Http\Controllers\Api\Review\ReviewController::class)->group(function () {
            //
        });
    });







});
