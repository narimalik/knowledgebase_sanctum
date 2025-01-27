<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

use App\Events\RegisteredUser;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Jobs\SendRegisteredEmailjob;

use App\Traits\Utilities;

class UserController extends Controller
{
    //
    use Utilities;

    public function login(Request $request){
        
        // It will through error if any
        $validated = $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);


        // User login
        $user_credentials = $request->only('email', 'password');
        
        if(Auth::attempt($user_credentials)){
            //User logged in
            $user = Auth::user();
            
           $user->tokens()->delete();

           $request->session()->regenerate();
           
           $global_abilities = $this->getTokenGlobalAbilities();           

            $token = $user->createToken( $request->input('email'), $global_abilities)->plainTextToken;

            # $token = $user->createToken( $request->input('email'), ['*'], now()->addMinute() )->plainTextToken;
        
            return response([ 
                "token"=>$token,
                "user"=>$user,
                'message'=>'Login successfull'
                ],
            200);

            
        }
        else{
            return response([
                'message' => 'Invalid Login Details'
            ], 401);
        }

    }


public function register(Request $request)
    {

        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       // event(new Registered($user));

        Auth::login($user);

        $token = $user->createToken($request->email)->plainTextToken;

         ## Create job to Send Welcom email         
         SendRegisteredEmailjob::dispatch($user);
         

        
        return response([
            "token"=>$token,
            "user"=>$user
        ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }

    public function isUserLoggedin(Request $request)
    {
        $message = '';
        $code = 0;

        if(Auth::check())
        {
            $message = 'User Still Logged In';
            $code = 200;
        }
        else{
            $message = 'User Logged Off';
            $code = 401;
        }

        return response([
            "message"=>$message
        ], $code);
    }

    public function getUsersAllData(Request $request)
    {
        // if( !$request->user()->tokenCan('article:can-view') ){
        //     return response([
                
        //     ],
        // 403);
        // }

        $data = User::with(["articles",  "articles.categories"])->get();
       // $data = User::find(25);  
        return UserResource::collection($data );
        // return response([
        //     "data"=> $data,            
        // ]);
    }



}
