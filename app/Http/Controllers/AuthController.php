<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login page
    public function login(Request $request)
    {
        // Flash a message for display
        $request->session()->flash('message', 'Welcome to the login page.');
        return view('login');
    }

    // Handle login
    public function handleLogin(Request $request) 
    {
        // Validate login form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Store user info in the session
            $request->session()->put('user', Auth::user());
            
            if (Auth::user()->role === 'admin') {
                // Redirect to dashboard if the user is an admin
                return redirect()->route('dashboard')->with('success', 'Logged in successfully');
            } elseif (Auth::user()->role === 'customer') {
                // Redirect to welcome page if the user is a regular user
                return redirect()->route('welcome')->with('success', 'Logged in successfully');
            }
        }

        // Redirect back with error message if login fails
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
        // Validate registration form inputs
        $request->validate([
            'first' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$/',
        ]);

        // Create a new user
        User::create([
            'name' => $request->input('first'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect to login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Clear the session and log out the user
        $request->session()->forget('user');
        Auth::logout();

        // Redirect to login with a logout message
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    // Show dashboard
    public function dashboard(Request $request)
    {
        // Retrieve logged-in user from session
        $user = $request->session()->get('user');

        // Check if a user is in the session
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
        }

        return view('admin.dashboard', compact('user'));
    }

    // Show homepage
    public function homepage()
    {
        return view('homepage');
    }
}
