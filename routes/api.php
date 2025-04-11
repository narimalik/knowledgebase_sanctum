<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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




Route::middleware(['auth:sanctum', 'throttle:0,1', 'myauth'])->group( function(){

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::resource('categories', CategoryController::class);
    
    Route::resource('articles', ArticleController::class);
    
    Route::resource("comments", CommentController::class);
    
    Route::post("getUsersalldata", [UserController::class, "getUsersAllData"]);

});