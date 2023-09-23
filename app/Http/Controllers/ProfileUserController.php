<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function create()
    {
        return view('dashboard.profile.create');
    }
}
