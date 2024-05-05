<?php

namespace App\Providers;

use App\Http\Services\Renting\RentingService;
use Illuminate\Support\ServiceProvider;

class RentingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('RentingService', function() {
            return new RentingService();
        });
    }

    public function boot()
    {
        //
    }
}
