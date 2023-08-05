<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formLogin() {
        return view('auth.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8',
        ]);
        if (auth()->attempt($data)) {
            if (auth()->user()->status == 'inactive') {
                auth()->logout();
                session()->flush();
                return back()->with('status', 'Your account is inactive');
            }
            return redirect()->route('dashboard');
        }
        return back()->with('status', 'Invalid login details');
    }

    public function formRegister() {
        return view('auth.register');
    }
}
