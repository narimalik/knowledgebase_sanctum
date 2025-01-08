<?php

namespace App\Jobs;

use App\Events\RegisteredUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRegisteredEmailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        //
        // $this->queue='usertasks'; If you want to specify a different queue.
        $this->user=$user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        RegisteredUser::dispatch($this->user);
    }
}
