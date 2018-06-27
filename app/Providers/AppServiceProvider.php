<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Post;
use App\Category;
use App\Image;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
        $categories_navbar = Category::all();
        $top_posts = Post::with('images')->take(5)->orderBy('created_at','desc')->get();

        \View::share(['categories_navbar'=> $categories_navbar, 'top_posts'=>$top_posts]);
        
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
