<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Promise\TaskQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/register',[UserController::class,'register']);
Route::post('user/login',[UserController::class,'login']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('user/getme',[UserController::class,'getme']);
    Route::post('add/task',[TaskController::class,'add']); 
    Route::get('get/task',[TaskController::class,'get']);
    Route::patch('update/task/{task}',[TaskController::class,'update']);
    Route::patch('delete/task/{task}',[TaskController::class,'delete']);
});
