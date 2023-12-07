<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'Successfully logged in');
            return redirect()->route('employees.index');
        } else {
            $request->session()->flash('error_login', 'The provided credentials do not match our records.');
            return redirect()->route('login')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
