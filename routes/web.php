<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post( 'login', [App\Http\Controllers\UserController::class, 'login' ] );

Route::post('register', [App\Http\Controllers\UserController::class, 'register'] );

Route::post('logout', [App\Http\Controllers\UserController::class, 'logout'] );

Route::post('isUserLogin', [App\Http\Controllers\UserController::class, 'isUserLoggedin'] );

// Its to show mailable in browser.
Route:: get( 'mailable', function(){
    $user = App\Models\User::find(1);
    return new App\Mail\UserRegistered($user);
} );

Route::get( 'test', function(){
    //$users=null;
    $users =  Cache::remember('all-users', 100, function(){
       return App\Models\User::all();
    });
    

    foreach($users as $user)    
    {
        echo PHP_EOL."<br/>user email : ". $user->email;
        
    }
});


# Routes for Artisan command.
Route::get("migrate", function(){
    Artisan::call('migrate');
    //php artisan migrate
    echo "Command ran successfully";
});

