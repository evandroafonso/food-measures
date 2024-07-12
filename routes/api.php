<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitMeasurementController;

Route::group([

    'middleware' => ['api', 'auth:api'],
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:api');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh',[AuthController::class, 'refresh']);
    Route::get('/me',[AuthController::class, 'me'] );
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'create']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::post('/unit', [UnitMeasurementController::class, 'create']);
    Route::get('/unit', [UnitMeasurementController::class, 'index']);
    Route::post('/product', [ProductController::class, 'create']);

});
