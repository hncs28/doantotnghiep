<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function admin()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // Validate email and password inputs
        $credentials = $request->validate([
            'email' => 'required|email', // Added email validation rule
            'password' => 'required', // Ensure password has at least 6 characters
        ]);

        \Log::info('Auth params', ['params' => $credentials]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->Role == 'user') {

                $request->session()->regenerate();

                \Log::info('Login successful');
                return redirect()->route('account');
            } elseif ($user->Role == 'admin') {
                $request->session()->regenerate();

                \Log::info('Login successful');
                return redirect()->route('CMSContract');
            }
        }


        // \Log::error('Login failed');

        // Redirect back with error messages and old input on failure
        return redirect()->route('login')
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput();

    }
    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->userPhone = $request->input('userPhone');
        $user->userAddress = $request->input('address');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        \Log::info('store success', ['data' => $user]);
        return view('auth/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('trangchu');
    }
}
