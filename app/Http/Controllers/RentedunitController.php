<?php

namespace App\Http\Controllers;

use App\Models\Rentedunit;

class RentedunitController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Rentedunit::class);
        return view(
            'rentedunits.index'
        );
    }

    public function create() {
        $this->authorize('create', Rentedunit::class);
        return view(
            'rentedunits.form'
        );
    }

    public function edit(Rentedunit $rentedunit) {
        $this->authorize('update', $rentedunit);
        return view(
            'rentedunits.form',
            [
                'rentedunit' => $rentedunit
            ]
        );
    }
}
