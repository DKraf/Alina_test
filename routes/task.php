<?php

use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'task', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/',     [TasksController::class, 'create']);
    Route::post('/{id}', [TasksController::class, 'update']);
    Route::get('/',      [TasksController::class, 'list']);
    Route::get('/{id}',  [TasksController::class, 'read']);
    Route::delete('/{id}',  [TasksController::class, 'delete']);
    Route::post('/{id}/status', [TasksController::class, 'updateStatus']);
});

