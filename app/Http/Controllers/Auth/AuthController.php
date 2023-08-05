<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username', // unique:table,column
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        // auth()->login($user);
        return redirect()->route('login')->with('status', 'Your account has been created. Please contact admin to activate your account.');
    }
}
