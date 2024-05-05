<?php

namespace App\Http\Controllers;

use App\Models\Rent;

class SubrentController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Rent::class);

        return view(
            'rents.subindex'
        );
    }

    public function create() {
        $this->authorize('create', Rent::class);
        return view(
            'rents.form'
        );
    }

    public function edit(Rent $rent) {
        $this->authorize('update', $rent);
        return view(
            'rents.form',
            [
                'rent' => $rent
            ]
        );
    }
}
