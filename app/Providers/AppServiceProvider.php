<?php

namespace App\Providers;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Ramsey\Collection\Collection as CollectionCollection;

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
        view()->composer('layouts.frontend.frontend', function ($view) {
          
            $website = \App\Models\Website::all();
            $categories = \App\Models\Category::all();
            $view->with([
                'resume' => ( $website->count() > 0 ? $website->first()->resume : ''),
                'categories' => $categories,
                'website' => ( $website->count() > 0 ? $website->first() : null)
            ]);
        });
        view()->composer('frontend/category/posts', function ($view) {
            $categories = \App\Models\Category::all();
            $view->with( 'categories',$categories);
        });

       
        Paginator::useBootstrap();
    }
}
