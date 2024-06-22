<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WorkerController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\TaskController;

Route::apiResource('workers', WorkerController::class);
Route::apiResource('costumers', CostumerController::class);
Route::apiResource('tasks', TaskController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
