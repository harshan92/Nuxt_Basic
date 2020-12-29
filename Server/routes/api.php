<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;

Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);
Route::get("/user", [AuthController::class, 'user']);
Route::post("/logout", [AuthController::class, 'logout']);

Route::group(['prefix'=>'topics'], function()
{
    Route::post('/', [TopicController::class, 'store'])->middleware('auth:api');
    Route::get('/', [TopicController::class, 'index']);
    Route::get('/{topic}', [TopicController::class, 'show']);
});