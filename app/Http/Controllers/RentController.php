<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RentRepository;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Rent::class);
        return view(
            'rents.index'
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

    public static function async(Request $request)
    {
        return RentRepository::async(
            $request->search,
            $request->input('selected', [])
        );
    }
}
