<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ViewAvailableunits;
use App\Models\Unit;
use Illuminate\Routing\ControllerMiddlewareOptions;

class AvailableunitsController extends Controller
{
    protected $middleware = [];

    public function index() {
        return view(
            'availableunits.index'
        );
    }

    public function middleware($middleware, array $options = [])
    {
        return [
            new ControllerMiddlewareOptions($options),
            new ViewAvailableunits()
        ];
    }
}
