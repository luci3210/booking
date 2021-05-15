<?php

namespace App\Providers;

use App\Model\Admin\ProductModel;
use App\Model\Admin\LocationModel;
use App\Model\Admin\DestinationModel;
use App\Model\Merchant\ProfileModel;
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

        // return $number_of_distination = DestinationModel::where('temp_status', '1')->get();

        View::composer('*', function ($view) {
            $view->with('number_of_distination', DestinationModel::where('temp_status', '1')->get());
        });

        View::composer('*', function ($view) {
            $view->with('number_of_hotels', ProfileModel::join('products','profiles.type','products.id')->where('profiles.temp_status', '1')->get());
        });


    }
}
