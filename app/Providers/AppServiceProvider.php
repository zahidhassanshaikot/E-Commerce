<?php

namespace App\Providers;

use App\Brand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Schema::defaultStringLength(191);
//        View::share('key', 'value');
        View::composer('front-end.includes.header',function ($view){
            $view->with('categories', Category::where('publication_status',1)->get()
            );
        });
        View::composer('front-end.includes.footer',function ($view){
            $view->with('brands', Brand::where('publication_status',1)->get()
            );
        });
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
