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

        /**
         * Define Gate for admin user role
         * Returns true if user role is set to admin
         **/ 
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });
        /**
         * Define Gate for salesman user role
         * Returns true if user role is set to salesman
         **/ 
        Gate::define('isSalesman', function($user) {
            return $user->role == 'salesman';
        });
        /**
         * Define Gate for professor user role
         * Returns true if user role is set to professor
         **/ 
        Gate::define('isCustomer', function($user) {
            return $user->role == 'customer';
        });
    }
}
