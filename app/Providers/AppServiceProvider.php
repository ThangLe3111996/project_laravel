<?php

namespace App\Providers;

use App\Categories as AppCategories;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view) {
            $categoryView = AppCategories::all();
            $view->with('categoryView',$categoryView);
        });
    }
}
