<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => [
                'required',
                'string',
                'email'
            ],
            'password' => [
                'required',
                'string'
            ],
            'remember' => [
                'boolean'
            ]
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return redirect()->route('login')->withErrors([
                'status' => 'Invalid email address or password'
            ]);
        }

        return redirect()->route('landing');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        session()->regenerate();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
