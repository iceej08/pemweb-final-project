<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthController extends Controller
{
    
    // Tampilkan halaman signup
    public function showSignupForm()
    {
        return view('masuk.signup'); // pastikan file-nya: resources/views/signup.blade.php
    }

    // Proses data signup
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user_moodiary',
            'email' => 'required|email|unique:user_moodiary',
            'password' => 'required|confirmed',
        ]);

        // Simpan user baru
        $user = new User();
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        // Simpan user ke session
        Session::put('user_moodiary', $user->username);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $credentials['username'])
                    ->orWhere('email', $credentials['username'])
                    ->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Session::put('user_moodiary', $user->username);
            return redirect('/home');
        }

        return back()->withErrors(['invalid' => 'Data tidak terdaftar atau password salah.']);
    }

    // Logout
    public function logout()
    {
        Session::forget('user_moodiary');
        return redirect('/login');
    }


}
