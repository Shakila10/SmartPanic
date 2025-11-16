<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $roles = Role::all();

        return view('auth.register', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'   => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'no_hp'      => 'required|string|max:20',
            'role_id'    => 'required|exists:roles,id',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->username,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'role_id'  => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
    }
}
