<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('lite.auth');
    }

    public function processLogin(Request $io)
    {
        $credentials = $io->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('shop');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
