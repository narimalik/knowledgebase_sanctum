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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', CategoryController::class)->middleware('auth:sanctum');

Route::resource('articles', ArticleController::class)->middleware('auth:sanctum');

Route::resource("comments", CommentController::class)->middleware("auth:sanctum");

Route::post("getUsersalldata", [UserController::class, "getUsersAllData"])->middleware('auth:sanctum');

