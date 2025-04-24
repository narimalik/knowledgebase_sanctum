<?php

namespace App\Providers;

use App\Events\ArticleEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\RegisteredUser;
use App\Events\SendContactUsEamilEvent;
use App\Listeners\DeleteArticleCategoriesListner;
use App\Listeners\SendContactUsEamilListener;
use App\Listeners\SendRegisteredEmail;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        RegisteredUser::class => [
            SendRegisteredEmail::class,
        ],

        ArticleEvent::class =>[
            DeleteArticleCategoriesListner::class
        ],

        SendContactUsEamilEvent::class =>[
            SendContactUsEamilListener::class
        ],


    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
