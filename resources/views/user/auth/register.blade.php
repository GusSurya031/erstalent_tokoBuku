@extends('layouts.main')

@section('container')
    <section class="min-h-screen flex justify-center items-center">
        <form
            class="mx-auto flex w-full max-w-lg flex-col rounded-xl border border-border bg-backgroundSecondary p-4 sm:p-20"
            action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="text-gray-500 mb-3 text-end">
                <a href="/">
                    Back to home
                </a>
            </div>
            <div class="flex w-full flex-col gap-3">
                <a href="/" class="text-2xl font-bold text-center">BookStore.</a>
                <p class="text-center">Sign up for a new account</p>
                <div class="form-group flex flex-col gap-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="input max-w-full @error('name') is-invalid @enderror"
                        placeholder="Your name">
                    @error('name')
                        <div class="text-sm text-red-600 italic">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group flex flex-col gap-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="input max-w-full @error('email') is-invalid @enderror "
                        placeholder="Your email">
                    @error('email')
                        <div class="text-sm text-red-600 italic">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group flex flex-col gap-3">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number"
                        class="input max-w-full @error('phone_number') is-invalid @enderror" placeholder="0812xxxx">
                    @error('phone_number')
                        <div class="text-sm text-red-600 italic">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="gender" class="">Gender</label>
                    <div class="grid grid-cols-2 items-center py-2 gap-4">
                        <div
                            class="flex gap-2 px-4 py-2 items-center hover:border hover:bg-gray-300 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:bg-gray-600 text-gray-900 dark:bg-black dark:text-white rounded-md">
                            <input id="laki-laki" name="gender" type="radio" required value="L"
                                class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror">
                            <label for="laki-laki">laki-laki</label>
                        </div>
                        <div
                            class="flex gap-2 px-4 py-2 items-center hover:border hover:bg-gray-300 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:bg-gray-600 text-gray-900 dark:bg-black dark:text-white rounded-md">
                            <input id="perempuan" name="gender" type="radio" required value="P"
                                class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group flex flex-col gap-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="input max-w-full @error('password') is-invalid @enderror" placeholder="Your password">
                    @error('password')
                    <div class="text-sm text-red-500 italic">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group flex flex-col gap-3">
                    <button type="submit" class="btn bg-slate-200 hover:bg-slate-300 dark:bg-black dark:text-white">Register</button>
                </div>
                <div class="form-group flex flex-col gap-3">
                    <p class="text-center">Already have an account? <a href="/login" class="link">Login</a></p>
                </div>
            </div>
        </form>
    @endsection
