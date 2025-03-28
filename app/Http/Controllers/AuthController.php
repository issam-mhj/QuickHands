<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'role'
        ]);
        User::create([
            "name"=>$request->fullname,
            "email"=>$request->email,
            "name"=>$request->fullname,
            "name"=>$request->fullname,
            "name"=>$request->fullname,
        ]);
        return redirect()->back()->with("done", "you have created the account successfully");
    }
}
