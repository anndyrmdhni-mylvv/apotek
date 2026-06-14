<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $username = $request->username;
        $password = $request->password;

        if ($username == 'admin' && $password == '123') {

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
        session()->flush();

        return redirect('/login');
    }
}