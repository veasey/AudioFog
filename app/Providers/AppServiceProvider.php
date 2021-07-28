<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Auth;
use Url;

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
      Blade::component('Track', Track::class);

      // all views to see current user
      \View::composer('*', function($view){
        $view->with('user', \Auth::user());
      });

      // force https on production
      if($this->app->environment('production')) {
          \URL::forceScheme('https');
      }
    }
}
