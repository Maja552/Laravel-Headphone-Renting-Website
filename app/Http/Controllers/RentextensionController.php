<?php

namespace App\Http\Controllers;

use App\Models\Rentextension;

class RentextensionController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Rentextension::class);
        return view(
            'rentextensions.index'
        );
    }

    public function create() {
        $this->authorize('create', Rentextension::class);
        return view(
            'rentextensions.form'
        );
    }

    public function edit(Rentextension $rentextension) {
        $this->authorize('update', $rentextension);
        return view(
            'rentextensions.form',
            [
                'rentextension' => $rentextension
            ]
        );
    }
}
