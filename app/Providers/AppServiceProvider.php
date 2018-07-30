<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    Schema::defaultStringLength(191);

	    View::composer('*', function ($view) {
	    	$view_name = str_replace('.', '-', $view->getName());
	    	View::share('view_name', $view_name);
	    });

	    // Force SSL in production
	    if ($this->app->environment() == 'production') {
		    URL::forceScheme('http');
	    }
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
