<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Comment;
use App\Policies\CommentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Comment' => 'App\Policies\CommentPolicy',
       // Comment::class => CommentPolicy::class, /// Its better to register policy class in all cases.
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
