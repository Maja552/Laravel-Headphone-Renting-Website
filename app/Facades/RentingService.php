<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RentingService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RentingService';
    }
}
