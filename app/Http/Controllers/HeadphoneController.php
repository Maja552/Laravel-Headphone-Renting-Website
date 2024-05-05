<?php

namespace App\Http\Controllers;

use App\Models\Headphone;

class HeadphoneController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Headphone::class);
        return view(
            'headphones.index'
        );
    }

    public function create() {
        $this->authorize('create', Headphone::class);
        return view(
            'headphones.form'
        );
    }

    public function edit(Headphone $headphone) {
        $this->authorize('update', $headphone);
        return view(
            'headphones.form',
            [
                'headphone' => $headphone
            ]
        );
    }
}
