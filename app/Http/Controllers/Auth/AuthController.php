<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formLogin() {
        return view('auth.login');
    }

    public function formRegister() {
        return view('auth.register');
    }
}
