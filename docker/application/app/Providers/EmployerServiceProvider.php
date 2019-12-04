<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\EmployerService;

class EmployerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\EmployerService', function ($app) {
            return new EmployerService();
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
