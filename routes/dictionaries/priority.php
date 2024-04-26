<?php

use App\Http\Controllers\Dictionaries\PriorityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'priority'], function () {
    Route::get('/', PriorityController::class);
});

