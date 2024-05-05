<?php

namespace App\Providers;

use App\Http\Repositories\FittypeRepository;
use Illuminate\Support\ServiceProvider;

class FittypeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('FittypeRepository', function () {
            return new FittypeRepository();
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
