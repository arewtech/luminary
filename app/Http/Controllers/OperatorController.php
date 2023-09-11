<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // $users = User::with('rentLogs')->latest()->get();
        // return $users;

        return view('dashboard.operator.index', [
            'operator' => User::where('id', '!=', auth()->id())
            ->whereRole('operator')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.operator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
        ]);
        $data['role'] = 'operator';
        $data['status'] = 'active';
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect()->route('operator.index')->with('success', 'User added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $operator)
    {
        return view('dashboard.operator.edit', [
            'operator' => $operator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $operator)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $operator->id,
            'email' => 'required|email|max:255|unique:users,email,' . $operator->id,
            'password' => 'nullable|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        $data['password'] = $request->password ? bcrypt($request->password) : $operator->password;
        $operator->update($data);
        return redirect()->route('operator.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $operator)
    {
        $operator->delete();
        return back()->with('success', 'User deleted successfully!');
    }
}
