<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function index() {
        return view('pages.login');
    }

    public function store(Request $request) {
        // dd($request);

        $validated = $request->validate([
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:4|max:255',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Domain Email Tidak Valid',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki minimal 5 karakter.',
        ]);

        if (Auth::attempt($validated)) {
            // dd(Auth::user()->roles->role_name);

            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('error', 'Email atau password anda salah, silakan isi kembali');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

