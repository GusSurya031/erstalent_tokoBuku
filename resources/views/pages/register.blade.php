@extends('layouts.main')

@section('container')
    <section>
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company">
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-1" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 @error('email') is-invalid @enderror">
                        </div>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" autocomplete="name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 @error('name') is-invalid @enderror">
                        </div>
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <label for="phone_number" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
                        <div class="mt-2">
                            <input id="phone_number" name="phone_number" type="text" autocomplete="phone_number" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 @error('phone_number') is-invalid @enderror">
                        </div>
                    </div>
                    @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <label for="gender" class="block text-sm font-medium leading-6 text-[#0077CC]">Gender</label>
                        <div class="grid grid-cols-2 items-center py-2 gap-4">
                            <div
                                class="flex gap-2 px-4 py-2 items-center hover:border hover:border-[#0077CC] hover:bg-sky-500/15 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:border-[#0077CC] text-gray-900 rounded-md">
                                <input id="laki-laki" name="gender" type="radio" required value="L"
                                    class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror">
                                <label for="laki-laki">laki-laki</label>
                            </div>
                            <div
                                class="flex gap-2 px-4 py-2 items-center hover:border hover:border-[#0077CC] hover:bg-sky-500/15 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:border-[#0077CC] text-gray-900 rounded-md">
                                <input id="perempuan" name="gender" type="radio" required value="P"
                                    class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror">
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm/6 text-gray-500">
                    Not a member?
                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14 day free
                        trial</a>
                </p>
            </div>
        </div>
    </section>
@endsection
