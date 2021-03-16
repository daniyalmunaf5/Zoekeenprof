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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin' , 'photographer']);
        });

        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('only-photographer', function($user){
            return $user->hasRole('photographer');
        });

    

        Gate::define('photographer-user-dashboard', function($user){
            return $user->hasAnyRoles(['user' , 'photographer']);
        });

        Gate::define('photographer', function($user){
            return $user->hasAnyRoles(['admin' , 'photographer']);
        });
        // Gate::define('photographer', function($user){
        //     return $user->hasRole('photographer');
        // });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });
    }
}
