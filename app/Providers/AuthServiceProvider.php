<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Post::class => 'App\Policies\PostPolicy',
        PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before(function($user){
        //     return $user->isSuperAdmin() ? true : null;
        // });

        // Gate::define('view-post', function($user, $post){
        //     return $user->id === $post->user->id;
        // });

        // Gate::define('review-post', function($user, $post){
        //     return $user->id === $post->user->id;
        // });


        Gate::define('user-can-view-any-post', 'App\Policies\PostPolicy@viewAny');

        // Gate::after(function($user){
        //     return $user->isSuperAdmin() ? true : null;
        // });

    }
}
