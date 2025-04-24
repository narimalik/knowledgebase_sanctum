<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
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

//Route::resource('categories', CategoryController::class);

 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });


    Route::match(['OPTIONS'], 'api/*', function() {
        return response()->json([], 200); // A simple empty response is fine for OPTIONS
    });
    


Route::middleware(['auth:sanctum'])->group( function(){
   
    Route::resource('categories', CategoryController::class);
    
    Route::resource('articles', ArticleController::class);
    
    Route::resource("comments", CommentController::class);
    
    Route::post("getUsersalldata", [UserController::class, "getUsersAllData"]);

    Route::post("contactus", [ContactUsController::class, "sendmail"]);

});