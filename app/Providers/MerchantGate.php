<?php

namespace App\Providers;

use App\Model\Merchant\UserModel;
use App\Model\Merchant\Profile;
use App\Model\Merchant\MerchantModel;
use App\Model\Admin\PlanModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MerchantGate extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('gatemerchant', UserModel::join('merchant','merchant.user_id','=','users.id')
                        ->join('myplans','myplans.id','=','merchant.plan_id')
                        ->join('temp_status','temp_status.id','=','myplans.temp_status')
                        ->where('myplans.temp_status','=','1')
                        ->whereNotNull('myplans.plan_key')
                        ->get(['users.*','merchant.*','myplans.*','temp_status.*']));
        });

        View::composer('*', function ($view) {
            $view->with('gatemerchant_prof', UserModel::join('profiles','profiles.user_id','=','users.id')
                        ->get(['users.id','profiles.id as profid']));
        });


        // if(empty(Auth::user()->id)) {
        // View::composer('*', function ($view) {
        //     $view->with('profpicz', Profile::where('profiles.user_id',1000)->get('profiles.profilepic')->first());
        // });
        //  } else {
           View::composer('*', function ($view) {
            $view->with('profpicz', Profile::where('profiles.user_id',Auth::user()->id)->get('profiles.profilepic'));
        }); 
         // }   


    }
}
