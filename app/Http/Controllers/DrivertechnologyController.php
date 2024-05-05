<?php

namespace App\Http\Controllers;

use App\Http\Repositories\DrivertechnologyRepository;
use App\Models\Drivertechnology;
use Illuminate\Http\Request;

class DrivertechnologyController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Drivertechnology::class);
        return view(
            'drivertechnologies.index'
        );
    }

    public function create() {
        $this->authorize('create', Drivertechnology::class);
        return view(
            'drivertechnologies.form'
        );
    }

    public function edit(Drivertechnology $drivertechnology) {
        $this->authorize('update', $drivertechnology);
        return view(
            'drivertechnologies.form',
            [
                'drivertechnology' => $drivertechnology
            ]
        );
    }

    public static function async(Request $request)
    {
        return DrivertechnologyRepository::async(
            $request->search,
            $request->input('selected', [])
        );
    }
}
