<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(125);
        view()->composer('layouts.frontend.footer.footer', function ($view) {
            $website = \App\Models\Website::all();
            $view->with('resume',( $website->count() > 0 ? $website->first()->resume : ''));
        });
        view()->composer('layouts.frontend.header.header', function ($view) {
            $categories = \App\Models\Category::all();
            $view->with('categories', $categories);
        });
    }
}
