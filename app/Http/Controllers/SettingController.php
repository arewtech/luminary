<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function create()
    {
        return view('dashboard.settings.create');
    }
}
