<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (session()->has('login') && session('login') === true) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {

            session([
                'login' => true
            ]);

            return redirect('/');
        }

        return redirect('/login')
                ->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect('/login');
    }
}