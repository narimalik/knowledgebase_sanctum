<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;
use App\Events\RegisteredUser;
use Throwable;
use Illuminate\Support\Facades\Log;

class SendRegisteredEmail implements ShouldQueue
{
    public $tries = 5;  //It will throw exception after this many time.

    #public $queue = 'usertasks';  // If you want to specify a seperate queue.

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisteredUser $user): void
    {
        
        $user = $user->user;

        Mail::to( $user)->send(new UserRegistered($user) );

    }

    public function failded( RegisteredUser $event, Throwable $exception )
    {
        //Log::info( $exception->getMessage() );
    }


}
