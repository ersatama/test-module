<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SHAHashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('hash', function() {
            return new SHAHasher();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
