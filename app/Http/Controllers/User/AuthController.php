<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if ($request->username === $request->password) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('login')
            ->with('error', 'Username atau password salah!')
            ->withInput($request->only('username'));
    }
    
}
