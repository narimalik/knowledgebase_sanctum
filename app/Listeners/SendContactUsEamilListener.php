<?php

namespace App\Listeners;

use App\Events\SendContactUsEamilEvent;
use App\Mail\ContactUsEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class SendContactUsEamilListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * Event object will pass in handle function automatically   //Anwaar
     */
    public function handle(SendContactUsEamilEvent $event): void
    {

        $data = $event->data;

        \Log::info($data["email"]);

        Mail::to( $data["email"] )->send( new ContactUsEmail($data) );
        
    }

}
