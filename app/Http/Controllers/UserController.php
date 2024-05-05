<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view(
            'users.index'
        );
    }

    public static function async(Request $request)
    {
        return UserRepository::async(
            $request->search,
            $request->input('selected', [])
        );
    }
}
