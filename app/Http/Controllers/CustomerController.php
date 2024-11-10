<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.customer', compact('roles', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email:dns|max:255|unique:users,email',
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
            'email.unique' => 'Email sudah terdaftar, gunakan email yang lain',
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
            'role_id' => $request->role_id,
        ]);

        return redirect()->back()->with('success', 'Registered Successfuly');
    }

    public function update(Request $request, User $user)
    {
        // dd($user);
        $validated = $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => ['required', 'email:dns', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone_number' => 'required|string|max:13|regex:/^([0-9\s\-\+\(\)]*)$/',
            'gender' => ['required', Rule::in(['L', 'P'])],
            'password' => 'nullable|min:8', // Add password validation as optional
        ], [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal terdiri dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Domain Email Tidak Valid',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'email.unique' => 'Email sudah terdaftar, gunakan email yang lain',
            'phone_number.required' => 'Nomor Telepon harus diisi',
            'phone_number.max' => 'Nomor Telepon tidak lebih dari 13 digit',
            'phone_number.regex' => 'Nomor Telepon harus berupa angka',
            'gender.required' => 'Jenis Kelamin wajib diisi',
        ]);

        // Check if a new password is provided, otherwise keep the existing password
        $new_password = isset($validated['password']) ? Hash::make($validated['password']) : $user->password;

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $new_password,
            'phone_number' => $validated['phone_number'],
            'gender' => $validated['gender'],
            'role_id' => $request->role_id,
        ]);

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deletes successfully.');
    }
}
