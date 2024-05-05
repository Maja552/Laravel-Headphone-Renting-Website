<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ManufacturerRepository;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Manufacturer::class);
        return view(
            'manufacturers.index'
        );
    }

    public function create() {
        $this->authorize('create', Manufacturer::class);
        return view(
            'manufacturers.form'
        );
    }

    public function edit(Manufacturer $manufacturer) {
        $this->authorize('update', $manufacturer);
        return view(
            'manufacturers.form',
            [
                'manufacturer' => $manufacturer
            ]
        );
    }

    public static function async(Request $request)
    {
        return ManufacturerRepository::async(
            $request->search,
            $request->input('selected', [])
        );
    }
}
