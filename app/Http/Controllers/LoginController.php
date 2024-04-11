<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Redirect::intended('/login')->with('success', 'Вы успешно вошли в систему');
        }
        return back()->with('error', 'the provided credentials does not match our records. ',
        )->onlyInput('email', 'password');
    }

    public function login() {
        return view('login', ['user' => Auth::user()]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Вы успешно вышли из системы');
    }
}
