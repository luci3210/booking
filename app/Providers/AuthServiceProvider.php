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
        

        Gate::define('merchant',function() {

            ProfileModel::join('profile_users','profiles.id','profile_users.up_profile_id')

        ->where(function($query) {

            $query->from('profile_users')->where([['profile_users.up_user_id',Auth::user()->id],['profile_users.pu_temp',1]]);
            
            })->select('profile_users.up_profile_id as profile','profile_users.up_user_id')->firstOrFail();

        });
    }
}
