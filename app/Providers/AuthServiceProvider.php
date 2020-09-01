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
        // 'App\Model' => 'App\Policies\ModelPolicy',
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

        Gate::define('view-post', function($user, $post){
            return $user->id === $post->user->id;
        });

        // Gate::define('review-post', function($user, $post){
        //     return $user->id === $post->user->id;
        // });


        // Gate::after(function($user){
        //     return $user->isSuperAdmin() ? true : null;
        // });

    }
}
