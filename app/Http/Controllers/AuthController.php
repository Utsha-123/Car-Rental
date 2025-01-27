<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login page
    public function login()
    {
        return view('login');
    }

    // Handle login
    public function handleLogin(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to dashboard or home
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    // Show registration page
    public function registration()
    {
        return view('registration');
    }

    // Handle registration
    public function handleRegistration(Request $request)
    {
        $request->validate([
            'first' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$/',
        ]);

        // dd($request); 
               // Create a new user
        User::create([
            'name' => $request->input('first'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function homepage(){
        return view('homepage');
    }
}
