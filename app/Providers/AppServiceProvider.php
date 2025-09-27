<?php

namespace App\Providers;

use App\Models\category;
use App\Models\Footer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $footer = Footer::first();
        $categorys = Category::orderBy('name', 'asc')->limit(6)->get();
        View::share('footer', $footer);
        View::share('categorys', $categorys);
    }
}
