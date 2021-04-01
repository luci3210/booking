<?php

namespace App\Providers;

use App\Model\Admin\ProductModel;
use App\Model\Admin\locationModel;
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
    }
}
