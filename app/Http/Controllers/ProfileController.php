<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $request->validate([
            'new_name' => 'required|string',
            'new_email' => 'required|string|unique:user_moodiary,email,'. $user->id,
        ]);

        $user->name = $request->new_name;
        $user->email = $request->new_email;

        $user->save();
        return redirect()->route('profile', ['username' => $user->username])->with('success', 'Profil berhasil diperbarui!');
    }
}
