<?php

namespace App\Providers;

use App\Category;
use App\Post;
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
        view()->composer('layouts.partials.app-sidebar', function ($view){
            $view->with('popular_posts', Post::getPopular(3));
            $view->with('featured_posts', Post::getFeatured(3));
            $view->with('recent_posts', Post::getRecent(4));
            $view->with('categories', Category::all());
        });

        view()->composer('layouts.partials.admin-sidebar', function ($view){
            $view->with('new_comments', \App\Comment::countNew());
        });
    }
}
