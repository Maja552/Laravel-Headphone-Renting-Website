<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class BacktypeRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BacktypeRepository';
    }
}
