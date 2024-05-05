<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FittypeRepository;
use App\Models\Fittype;
use Illuminate\Http\Request;

class FittypeController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Fittype::class);
        return view(
            'fittypes.index'
        );
    }

    public function create() {
        $this->authorize('create', Fittype::class);
        return view(
            'fittypes.form'
        );
    }

    public function edit(Fittype $fittype) {
        $this->authorize('update', $fittype);
        return view(
            'fittypes.form',
            [
                'fittype' => $fittype
            ]
        );
    }
    public static function async(Request $request)
    {
        return FittypeRepository::async(
            $request->search,
            $request->input('selected', [])
        );
    }
}
