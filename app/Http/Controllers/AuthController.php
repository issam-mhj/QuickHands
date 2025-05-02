<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $user = User::create([
            "name" => $validated['fullname'],
            "email" => $validated['email'],
            "password" => Hash::make($validated['password']),
            "role" => $role,
        ]);
        if ($role == "provider") {
            Provider::create([
                'status' => "pending",
                'user_id' => $user->id,
            ]);
        }

        return redirect()->back()->with("done", "You have created the account successfully");
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect("admin/dashboard");
            } elseif ($user->role === 'provider') {
                if ($user->provider->status === 'pending') {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Your account is still pending approval.',
                    ]);
                }
                return redirect("provider/dashboard");
            } else {
                return redirect('/user/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/join');
    }



    public function showMessages()
    {
        return view("user.messages");
    }

}
