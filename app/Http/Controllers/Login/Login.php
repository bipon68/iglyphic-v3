<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class Login
{
    function login()
    {
        return view('login');
    }

    function loginPost(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/manage/products');
        }
        return redirect("/login");
    }

    function logout()
    {
        Auth::logout();

        return redirect('/');
    }

}
