<?php

namespace App\Providers;

use App\Http\Repositories\DrivertechnologyRepository;
use Illuminate\Support\ServiceProvider;

class DrivertechnologyRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DrivertechnologyRepository', function () {
            return new DrivertechnologyRepository();
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
