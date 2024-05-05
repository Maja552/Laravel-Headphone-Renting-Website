<?php

namespace App\Providers;

use App\Http\Repositories\BacktypeRepository;
use Illuminate\Support\ServiceProvider;

class BacktypeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('BacktypeRepository', function () {
            return new BacktypeRepository();
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
