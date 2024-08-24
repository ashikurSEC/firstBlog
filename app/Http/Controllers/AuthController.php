<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // Validate the request
        $fields = $request->validate([
            'username'  => ['required', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'min:3', 'confirmed'],
        ]);

        // Create user with hashed password
        $user = User::create([
            'username'  => $fields['username'],
            'email'     => $fields['email'],
            'password'  => Hash::make($fields['password']),
        ]);

        // Login the user after registration
        Auth::login($user);

        // Redirect to home route
        return redirect()->route('dashboard');
    }

    // Login User
    public function login(Request $request)
    {
        // Validate the request
        $fields = $request->validate([
            'email'     => ['required', 'email', 'max:255'],
            'password'  => ['required']
        ]);

        // Attempt to login
        if (Auth::attempt($fields, $request->remember)) {
            // Redirect to the dashboard if successful
            return redirect()->intended('dashboard');
        } else {
            // Redirect back with an error message
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    // Logout User
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate CSRF token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to home route
        return redirect('/');
    }
}
