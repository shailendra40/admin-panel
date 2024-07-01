<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route; // Add this import for ValidationException

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate admin user registration data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admin_users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Create and save the admin user
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Authenticate the admin user
        Auth::guard('admin')->login($User);

        // Redirect to the admin panel or dashboard
        return redirect()->route('admin.dashboard');
    }

    public function login(Request $request)
    {
        // Validate admin user login data
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the admin user
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the admin panel or dashboard
            return redirect()->route('admin.dashboard');
        }

        // Authentication failed, redirect back with an error message
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    // Other methods for managing admin users can be added here
}
