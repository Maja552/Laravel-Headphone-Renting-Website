<?php

namespace App\Http\Controllers;

class RentingController extends Controller
{
    public function index() {
        return view(
            'renting.index'
        );
    }
}
