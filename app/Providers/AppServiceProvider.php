<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //odkomentovat pro testování
//        if ($this->app->environment('local', 'slovnik.dev')) {
//            $this->app->register(DuskServiceProvider::class);
//        }
    }
}