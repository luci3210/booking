<?php

namespace App\Providers\service;

use App\Model\Admin\ProductModel;
use App\Model\Admin\LocationModel;
use App\Model\Admin\DestinationModel;
use App\Model\Admin\LocationCountyModel;
use App\Model\Merchant\ProfileModel;
use App\Model\Merchant\UserModel;
use App\Model\Admin\RoomFaciliModel;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TourismoServicesProvider extends ServiceProvider
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
            $view->with('select_active_services', 

                ProductModel::where(function($query) {
                    $query->from('products')->where('temp_status',1);
                })->get()
            );
        });


        View::composer('*', function ($view) {
            $view->with('select_active_inactive_services', 

                ProductModel::where(function($query) {
                    $query->from('products')->whereIn('temp_status',[1,2]);
                })->get()
            );
        });


        View::composer('*', function ($view) {
            $view->with('select_all_services', 

                ProductModel::where(function($query) {
                    $query->from('products');
                })->get()
            );
        });


        View::composer('*', function ($view) {
            $view->with('select_country', 

                LocationCountyModel::where(function($query) {
                    $query->from('location_country')->where('temp_status',1);
                })->orderBy('country','asc')->get()
            );
        });


        View::composer('*', function ($view) {
            $view->with('room_amenities', 

                RoomFaciliModel::where(function($query) {
                    $query->from('room_facilities')->where('temp_status',1);
                })->orderBy('name','asc')->get()
            );
        });
        
    }
}
