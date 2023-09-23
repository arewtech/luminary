<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function create()
    {
        return view('dashboard.profile.create');
    }

    public function update(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . auth()->user()->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'link_twitter' => 'nullable|string|max:255',
            'link_facebook' => 'nullable|string|max:255',
            'link_instagram' => 'nullable|string|max:255',
            'link_linkedin' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $image->storeAs('public/users', $image->hashName());
        //     $data['image'] = $image->hashName();
        // }

        auth()->user()->update($data);

        return back()->with('success', 'Profile updated successfully');
    }
}
