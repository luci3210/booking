<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PictureGate extends ServiceProvider
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

        // View::composer('*', function ($view) {
        //     $view->with('profpicz', Profile::where('profiles.user_id',Auth::user()->id)->get());
        // });
    }
}
