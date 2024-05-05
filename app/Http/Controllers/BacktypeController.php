<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BacktypeRepository;
use App\Models\Backtype;
use Illuminate\Http\Request;

class BacktypeController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Backtype::class);
        return view(
            'backtypes.index'
        );
    }

    public function create() {
        $this->authorize('create', Backtype::class);
        return view(
            'backtypes.form'
        );
    }

    public function edit(Backtype $backtype) {
        $this->authorize('update', $backtype);
        return view(
            'backtypes.form',
            [
                'backtype' => $backtype
            ]
        );
    }

    public static function async(Request $request)
    {
        return BacktypeRepository::async(
            $request->search,
            $request->input('selected', [])
        );
    }
}
