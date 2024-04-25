<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserConfigurationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCounterpartyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Auth\OtpController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function () {
    Route::post('all', [AuthController::class, 'login']);
});

