<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('login.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credential)) {

            return redirect()->intended('/');
        };

        return back()->with('loginError', 'login gagal');
    }

    public function banner()
    {
        return view('dashboard/banner');
    }
}
