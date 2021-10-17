<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Admin\ProductModel;
use Illuminate\Support\Facades\View;



class MerchantSideBar extends ServiceProvider
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
           
           return $view->with('service_list', ProductModel::join('temp_status','temp_status.id','products.temp_status')
                ->whereIn('temp_status.status', ['active','disabled'])
                    ->where('products.id','!=',100113)->orderBy('temp_status.id','asc')->get());
            });

          View::composer('*', function ($view) {
           
           return $view->with('service_exlusive', ProductModel::join('temp_status','temp_status.id','products.temp_status')
                        ->whereIn('temp_status.status', ['active'])
                    ->where('products.id',100113)->orderBy('temp_status.id','asc')->first());
        });
    }
}
