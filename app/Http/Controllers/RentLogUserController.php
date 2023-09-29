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
        $query = $user->rentLogs()->with('book')->latest();
        if ($request->q) {
            $query->whereHas('book', function ($query) use ($request) {
                $query->where('title', 'like', "%{$request->q}%");
            });
        }
        return view('users.index', [
            'rentLogs' => $query->paginate(setting('app_paginate') ?? 10),
            'userFines' => $user->rentLogs()->where('status', 'late')->sum('fine'),
        ]);
    }

    public function show(Request $request, User $user) {
        $rentLogUser = RentLog::with('book')->findOrFail($request->rentLog);
        if ($rentLogUser->user_id != $user->id || auth()->user() != $user) {
            abort(404, 'Page not found');
        }
        return view('users.show', [
            'rentLogUser' => $rentLogUser,
        ]);
    }
}
