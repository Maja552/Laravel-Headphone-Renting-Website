<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RentstatusRepository;
use App\Models\Rentstatus;
use Illuminate\Http\Request;

class RentstatusController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Rentstatus::class);
        return view(
            'rentstatuses.index'
        );
    }

    public function create() {
        $this->authorize('create', Rentstatus::class);
        return view(
            'rentstatuses.form'
        );
    }

    public function edit(Rentstatus $rentstatus) {
        $this->authorize('update', $rentstatus);
        return view(
            'rentstatuses.form',
            [
                'rentstatus' => $rentstatus
            ]
        );
    }

    public static function async(Request $request)
    {
        return RentstatusRepository::async(
            $request->search,
            $request->input('selected', [])
        );
    }
}
