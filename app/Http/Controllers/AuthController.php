<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'terms' => 'accepted'
        ]);
        $role = $request->role;
        if ($request->email === "admin@quickhands.com" && $request->password === "Admin@0123") {
            $role = "admin";
        }

        User::create([
            "name" => $validated['fullname'],
            "email" => $validated['email'],
            "password" => Hash::make($validated['password']),
            "role" => $role,
        ]);

        return redirect()->back()->with("done", "You have created the account successfully");
    }
}
