<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;

class RentLogUserController extends Controller
{
    public function index(Request $request, User $user)
    {
        if (auth()->user() != $user) {
            abort(404, 'Page not found');
        }
        return view('users.index', [
            'rentLogs' => $user->rentLogs()->with('book')->latest()->get(),
            'userFines' => $user->rentLogs()->where('status', 'late')->sum('fine'),
        ]);
    }
}
