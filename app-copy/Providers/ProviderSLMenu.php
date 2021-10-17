<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Model\Admin\ProductModel;

class ProviderSLMenu extends ServiceProvider
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
            $view->with('slmenu', ProductModel::join('temp_status','temp_status.id', 'products.temp_status','products.asc')
                    ->whereIn('temp_status.status', ['active','disabled'])
                    ->where('products.id','!=',100113)->orderBy('products.asc','asc')->get());
        });

        View::composer('*', function ($view) {
            $view->with('slmenu_exlusive', ProductModel::join('temp_status','temp_status.id', 'products.temp_status')
                    ->whereIn('temp_status.status', ['active','disabled'])
                    ->where('products.id',100113)->orderBy('temp_status.id','asc')->get());
        });
    }
}
