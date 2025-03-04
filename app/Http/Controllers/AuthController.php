<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends BaseController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Chuyển hướng sau khi đăng nhập
        }

        return back()->withErrors([
            'username' => 'Tài khoản hoặc mật khẩu không chính xác.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,students'
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect('/login')->with('success', 'Đăng ký thành công');
    }
}
