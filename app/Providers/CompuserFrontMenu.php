<?php

namespace App\Providers;

use App\Model\Admin\ProductModel;
use App\Model\Admin\LocationModel;
use App\Model\Merchant\Profile;
use App\Model\Merchant\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CompuserFrontMenu extends ServiceProvider
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
            $view->with('services', ProductModel::where('temp_status', '1')->get());
        });

        View::composer('*', function ($view) {
            $view->with('menu_location', locationModel::where('temp_status', '1')->get());
        });


        // -------------------------------------- Profile Photo ------------------------------------------------

        if(Auth::check()) { 

            $profilepik = Profile::where('profiles.plan_id',Auth::user()->id)->get('profiles.plan_id')->first();

            if(empty($profilepik)) {

                 View::composer('*', function ($view) {
                    $view->with('photo', Profile::where('profiles.plan_id',0)->get('profiles.profilepic')->first());
                });
            }
            else {

                 View::composer('*', function ($view) {
                    $view->with('photo', Profile::where('profiles.plan_id',Auth::user()->id)->get('profiles.profilepic')->first());
                });
            }
        }
        else {

            View::composer('*', function ($view) {
                $view->with('photo', Profile::where('profiles.plan_id',0)->get('profiles.profilepic')->first());
            });
        }
        // -------------------------------------- Profile Photo ------------------------------------------------

    }
}
