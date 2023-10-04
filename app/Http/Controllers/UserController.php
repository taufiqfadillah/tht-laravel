<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:125',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['image'] = 'user.png';

        User::create($data);

        return redirect()->back()->with('success', 'Account created successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/index');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:64',
            'position' => 'required|string|max:64',
            'image' => 'image|mimes:png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/assets/user-images/' . $user->image);
            }

            $imageName = 'user_' . $user->id . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();

            $imagePath = $request->file('image')->storeAs('public/assets/user-images', $imageName);

            $user->image = $imageName;
        }

        $user->name = $data['name'];
        $user->position = $data['position'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
