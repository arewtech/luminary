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
                flash()
                ->option('position', 'top-center')
                ->addError('Your account is inactive, please contact admin to activate your account');
                return back();
            }
            return redirect()->route('dashboard')->with('success', 'Welcome back, '.auth()->user()->name);
        }
        flash()
        ->option('position', 'top-center')
        ->addError('Invalid login credentials or your account is inactive');
        return back();
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
        flash()
        ->option('position', 'top-center')
        ->option('timer', 4000)
        ->addSuccess('Your account has been created. Please contact admin to activate your account.');
        return redirect()->route('login');
    }
}
