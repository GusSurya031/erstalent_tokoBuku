<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index() {
        return view('pages.register');
    }

    public function store(Request $request){
        $roles_user = 1;
        // dd($request);

        $validated = $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:5',
            'phone_number' => 'required|string|max:13|regex:/^([0-9\s\-\+\(\)]*)$/',
            'gender' => ['required', Rule::in(['L', 'P'])],
        ], [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal terdiri dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Domain Email Tidak Valid',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki minimal 5 karakter.',
            'phone_number.required' => 'Nomor Telepon harus diisi',
            'phone_number.max' => 'Nomor Telepon tidak lebih dari 13 digit',
            'phone_number.regex' => 'Nomor Telepon harus berupa angka',
            'gender.required' => 'Jenis Kelamin wajib diisi',
        ]);

        // dd($validated);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone_number'],
            'gender' => $request['gender'],
            'role_id' => $roles_user
        ]);

        return redirect('/');
    }
}
