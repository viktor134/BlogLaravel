<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('pages._sidebar', function ($view) {

            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('featuredPosts', Post::getFeaturedPosts());
            $view->with('recentPosts',Post::getRecentPosts());

        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
