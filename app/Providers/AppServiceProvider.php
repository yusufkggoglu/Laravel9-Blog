<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;


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
        Paginator::useBootstrap();

        // Use following code if you prefer to create a class
        // Based view composer otherwise use callback
        View::composer('post.list', PostComposer::class);
        View::composer('*', function ($view) {
            $setting = Setting::first();
            $view->with('setting',  $setting);
        });
    }
}
