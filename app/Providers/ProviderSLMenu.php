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
            $view->with('slmenu', ProductModel::join('temp_status','temp_status.id', 'products.temp_status')
                    ->whereIn('temp_status.status', ['active','disable'])->get());
        });
    }
}