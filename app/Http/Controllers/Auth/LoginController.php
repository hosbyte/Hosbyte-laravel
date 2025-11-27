<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // متدهای دستی
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'اطلاعات ورود نامعتبر است.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}