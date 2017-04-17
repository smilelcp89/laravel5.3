<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //view()->share('rootPath','abc12345');
       // view()->share('baseName','商店');
        view()->share(['rootPath'=>'abc12345','baseName' => '商店']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
