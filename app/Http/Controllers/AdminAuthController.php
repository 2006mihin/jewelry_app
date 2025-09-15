<?php

// AdminAuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Not authorized as admin']);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
