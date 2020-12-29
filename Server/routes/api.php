<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;

Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);
Route::get("/user", [AuthController::class, 'user']);
Route::post("/logout", [AuthController::class, 'logout']);

Route::group(['prefix'=>'topics'], function()
{
    Route::post('/', [TopicController::class, 'store'])->middleware('auth:api');
    Route::get('/', [TopicController::class, 'index']);
    Route::get('/{topic}', [TopicController::class, 'show']);
    Route::patch('/{topic}', [TopicController::class, 'update'])->middleware('auth:api');
    Route::delete('/{topic}', [TopicController::class, 'destroy'])->middleware('auth:api');
    //posts
    Route::group(['prefix'=>'/{topic}/posts'], function(){
        Route::post('/', [PostController::class, 'store'])->middleware('auth:api');
        Route::patch('/{post}', [PostController::class, 'update'])->middleware('auth:api');
        Route::delete('/{post}', [PostController::class, 'destroy'])->middleware('auth:api');
    });
});