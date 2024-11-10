@extends('layouts.main')

@section('container')
    <section class="min-h-screen flex justify-center items-center">
        <form
            class="mx-auto flex w-full max-w-lg flex-col rounded-xl border border-border bg-backgroundSecondary p-4 sm:p-20">
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
                    <input type="text" id="name" name="name" class="input" placeholder="Your name">
                </div>
                <div class="form-group flex flex-col gap-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="input" placeholder="Your email">
                </div>
                <div class="form-group flex flex-col gap-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="input" placeholder="Your password">
                </div>
                <div class="form-group flex flex-col gap-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input"
                           placeholder="Confirm your password">
                </div>
                <div class="form-group flex flex-col gap-3">
                    <button type="submit" class="btn">Register</button>
                </div>
                <div class="form-group flex flex-col gap-3">
                    <p class="text-center">Already have an account? <a href="/login" class="link">Login</a></p>
                </div>
            </div>
        </form>
@endsection

