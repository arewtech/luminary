<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with('rentLogs')->latest()->get();
        // return $users;

        return view('dashboard.users.index', [
            'users' => User::whereRole('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);


        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('images/users', 'public');
        }

        $data['role'] = 'user';
        $data['status'] = 'active';
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user->load('rentLogs'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->except(['_token', '_method']);

        $data['password'] = $request->password ? bcrypt($request->password) : $user->password;
        if ($request->file('image')) {
            Storage::delete('public/' . $user->image);
            $data['image'] = $request->file('image')->store('images/users', 'public');
        } else {
            $data['image'] = $user->image;
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete('public/' . $user->image);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
