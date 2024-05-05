<?php

namespace App\Http\Controllers;

use App\Models\Unit;

class UnitController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Unit::class);
        return view(
            'units.index'
        );
    }

    public function create() {
        $this->authorize('create', Unit::class);
        return view(
            'units.form'
        );
    }

    public function edit(Unit $unit) {
        $this->authorize('update', $unit);
        return view(
            'units.form',
            [
                'unit' => $unit
            ]
        );
    }
}
