<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login() {
        $data = [
            'title' => 'Login'
        ];

        return view('auth.login', $data);
    }

    public function doLogin(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home')->with('success', 'Login success!' );
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.'
        ]);
    }

    public function register() {
        $data = [
            'title' => 'Register'
        ];

        return view('auth.register', $data);
    }

    public function doRegister(Request $request): RedirectResponse {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::query()->create($validated);

        return redirect('/login')->with('success', 'Registration success!' );
    }

    public function doLogout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
