<?php

use App\Http\Controllers\Dictionaries\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'status'], function () {
    Route::get('/', StatusController::class);
});

