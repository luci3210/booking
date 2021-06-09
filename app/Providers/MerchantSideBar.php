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
                        ->where('products.temp_status',1)
                        ->get(['products.name','products.id']));
        });
    }
}
