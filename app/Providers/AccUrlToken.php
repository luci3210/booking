<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AccUrlToken extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    private $UrlToken;

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function index() {

        return $this->UrlToken = csrf_token();
    }
    public function boot()
    {
        
          View::composer('*', function ($view) {
           
           return $view->with('url',$this->index());
        });
    }
}
