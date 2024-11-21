@extends('layouts.main')

@section('container')
    <style>
        .table>thead>tr :not(.th:first-child, .th:last-child),
        .table>thead>tr th:last-child {
            border-bottom-width: 0px;
            border-top-width: 0px;
        }
    </style>
    <div class="flex">
        <div class="w-1/5">
            @include('components.sidebar')
        </div>

        <div class="flex-1 p-6 gap-6 space-y-4">
            @if (session()->has('success'))
                <div id="toast"
                    class="flex items-center max-w-md p-4 mb-4 text-gray-600 bg-green-200 border border-gray-200 rounded-lg shadow-md space-x-3 transition-all">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-100 text-green-600 flex items-center justify-center rounded-full">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1.707-7.707a1 1 0 011.414 0L10 10.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-1.293-1.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button onclick="closeToast()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 9.293l4.95-4.95a1 1 0 011.414 1.414L11.414 10l4.95 4.95a1 1 0 01-1.414 1.414L10 11.414l-4.95 4.95a1 1 0 01-1.414-1.414L8.586 10l-4.95-4.95A1 1 0 015.05 3.636L10 8.586l4.95-4.95a1 1 0 011.414 1.414L11.414 10 15.95 14.95a1 1 0 01-1.414 1.414L10 11.414 5.05 16.364a1 1 0 01-1.414-1.414L8.586 10 3.636 5.05a1 1 0 011.414-1.414L10 9.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
            <h1 class="text-3xl font-bold">
                Customer List
            </h1>
            <p class="text-gray-500">
                Here are the list of customers that have made transactions in the bookstore.
            </p>
            <div class="flex w-full overflow-x-auto overflow-y-hidden items-center">
                <table class="table-hover table">
                    <thead>
                        <tr>
                            <th>
                                <div class="flex border-none items-center">
                                    <div class="dropdown-container justify-center" style="border: none">
                                        <div class="dropdown dropdown-hover" style="border: none">
                                            <label class="btn my-2" tabindex="0" style="border: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-filter opacity-75" style="border: none">
                                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                                </svg>
                                            </label>
                                            <div class="dropdown-menu dropdown-menu-bottom-right">
                                                <a class="dropdown-item text-sm border-none">Book Title</a>
                                                <a tabindex="-1" class="dropdown-item text-sm border-none">Category</a>
                                                <a tabindex="-1" class="dropdown-item text-sm border-none">Stock</a>
                                                <a tabindex="-1" class="dropdown-item text-sm border-none">Price</a>
                                            </div>
                                        </div>
                                    </div>
                                    <article class="border-none">
                                        <label class="btn" for="modal-book">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="opacity-75 border-none lucide lucide-square-plus">
                                                <rect width="18" height="18" x="3" y="3" rx="2" />
                                                <path d="M8 12h8" />
                                                <path d="M12 8v8" />
                                            </svg>
                                            Add User
                                        </label>

                                        <input class="modal-state" id="modal-book" type="checkbox" />
                                        <div class="modal">
                                            <label class="modal-overlay" for="modal-book"></label>
                                            <div class="modal-content ring-0 flex w-full flex-col gap-5 p-7 min-w-[800px]">
                                                <label for="modal-book"
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                                <h2 class="text-xl">Add New User</h2>
                                                <form action="{{ route('customer.store') }}" method="POST"
                                                    class="grid grid-cols-1 md:grid-cols-2 gap-4 space-y-4 md:space-y-0">
                                                    @csrf
                                                    <div class="col-span-1">
                                                        <label for="name"
                                                            class="block text-sm font-medium text-gray-700">Name</label>
                                                        <input type="text" name="name" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('name') is-invalid @enderror"
                                                            placeholder="Your name">
                                                        @error('name')
                                                            <div class="text-sm text-red-600 italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="email"
                                                            class="block text-sm font-medium text-gray-700">Email</label>
                                                        <input type="text" name="email" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') is-invalid @enderror "
                                                            placeholder="Your email">
                                                        @error('email')
                                                            <div class="text-sm text-red-600 italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="phone_number"
                                                            class="block text-sm font-medium text-gray-700">Phone
                                                            Number</label>
                                                        <input type="text" name="phone_number" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('phone_number') is-invalid @enderror"
                                                            placeholder="0812xxxx">
                                                        @error('phone_number')
                                                            <div class="text-sm text-red-600 italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="gender"
                                                            class="block text-sm font-medium text-gray-700">Gender</label>
                                                        <div class="grid grid-cols-2 items-center py-2 gap-4">
                                                            <div
                                                                class="flex gap-2 px-4 py-2 items-center hover:border hover:bg-gray-300 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:bg-gray-600 text-gray-900 dark:bg-black dark:text-white rounded-md">
                                                                <input id="laki-laki" name="gender" type="radio"
                                                                    required value="L"
                                                                    class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror">
                                                                <label for="laki-laki">laki-laki</label>
                                                            </div>
                                                            <div
                                                                class="flex gap-2 px-4 py-2 items-center hover:border hover:bg-gray-300 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:bg-gray-600 text-gray-900 dark:bg-black dark:text-white rounded-md">
                                                                <input id="perempuan" name="gender" type="radio"
                                                                    required value="P"
                                                                    class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror">
                                                                <label for="perempuan">Perempuan</label>
                                                            </div>
                                                        </div>
                                                        @error('gender')
                                                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="role_id"
                                                            class="block text-sm font-medium text-gray-700">Role</label>
                                                        <select name="role_id" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                            <option value="" hidden>-Select Role-</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}">
                                                                    {{ $role->role_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="password"
                                                            class="block text-sm font-medium text-gray-700">Password</label>
                                                        <input type="password" name="password" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') is-invalid @enderror"
                                                            placeholder="****">
                                                        @error('password')
                                                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-1 md:col-span-2">
                                                        <button type="submit"
                                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Add
                                                            User</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </div>

                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <input type="text" class="input" placeholder="Search for books ...">
                            </th>
                            <th>
                                <button class="btn">Search</button>
                            </th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>No. Phone</th>
                            <th>Gender</th>
                            <th style="text-align: center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>********</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->gender }}</td>
                                <td style="text-align: center">
                                    <label class="btn btn-primary" for="modal-user-{{ $user->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                            <path
                                                d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                            <path d="m15 5 4 4" />
                                        </svg>
                                    </label>
                                    <input class="modal-state" id="modal-user-{{ $user->id }}" type="checkbox" />
                                    <div class="modal">
                                        <label class="modal-overlay" for="modal-user-{{ $user->id }}"></label>
                                        <div class="modal-content ring-0 flex w-full flex-col gap-5 p-7 min-w-[800px]">
                                            <label for="modal-user-{{ $user->id }}"
                                                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                            <h2 class="text-xl">Edit User</h2>
                                            <form action="{{ route('customer.update', $user) }}" method="POST"
                                                class="grid grid-cols-1 md:grid-cols-2 gap-4 space-y-4 md:space-y-0">
                                                @csrf
                                                @method('PUT')
                                                <div class="col-span-1">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">Name</label>
                                                    <input type="text" name="name" required
                                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('name') is-invalid @enderror"
                                                        placeholder="Your name" value="{{ $user->name }}">
                                                    @error('name')
                                                        <div class="text-sm text-red-600 italic">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-span-1">
                                                    <label for="email"
                                                        class="block text-sm font-medium text-gray-700">Email</label>
                                                    <input type="text" name="email" required
                                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') is-invalid @enderror "
                                                        placeholder="Your email" value="{{ $user->email }}">
                                                    @error('email')
                                                        <div class="text-sm text-red-600 italic">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-span-1">
                                                    <label for="phone_number"
                                                        class="block text-sm font-medium text-gray-700">Phone
                                                        Number</label>
                                                    <input type="text" name="phone_number" required
                                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('phone_number') is-invalid @enderror"
                                                        placeholder="0812xxxx" value="{{ $user->phone_number }}">
                                                    @error('phone_number')
                                                        <div class="text-sm text-red-600 italic">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-span-1">
                                                    <label for="gender"
                                                        class="block text-sm font-medium text-gray-700">Gender</label>
                                                    <div class="grid grid-cols-2 items-center py-2 gap-4">
                                                        <div
                                                            class="flex gap-2 px-4 py-2 items-center hover:border hover:bg-gray-300 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:bg-gray-600 text-gray-900 dark:bg-black dark:text-white rounded-md">
                                                            <input id="laki-laki" name="gender" type="radio" required
                                                                value="L"
                                                                class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror"
                                                                @if ($user->gender == 'L') checked @endif>
                                                            <label for="laki-laki">laki-laki</label>
                                                        </div>
                                                        <div
                                                            class="flex gap-2 px-4 py-2 items-center hover:border hover:bg-gray-300 has-[:checked]:bg-sky-500/15 has-[:checked]:border-2 has-[:checked]:bg-gray-600 text-gray-900 dark:bg-black dark:text-white rounded-md">
                                                            <input id="perempuan" name="gender" type="radio" required
                                                                value="P"
                                                                class="focus:ring-gray-400 text-[#0077cc] @error('gender') is-invalid @enderror"
                                                                @if ($user->gender == 'P') checked @endif>
                                                            <label for="perempuan">Perempuan</label>
                                                        </div>
                                                    </div>
                                                    @error('gender')
                                                        <div class="text-sm text-red-500 italic">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-span-1">
                                                    <label for="role_id"
                                                        class="block text-sm font-medium text-gray-700">Role</label>
                                                    <select name="role_id" required
                                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                        <option value="" hidden>-Select Role-</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                                @if ($user->role_id == $role->id) selected @endif>
                                                                {{ $role->role_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-1">
                                                    <label for="password"
                                                        class="block text-sm font-medium text-gray-700">Password</label>
                                                    <input type="password" name="password" required
                                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') is-invalid @enderror"
                                                        placeholder="****" value="{{ $user->password }}">
                                                    @error('password')
                                                        <div class="text-sm text-red-500 italic">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-span-1 md:col-span-2">
                                                    <button type="submit"
                                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Update
                                                        User</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <label class="btn btn-error" for="modal-delete-user-{{ $user->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                            <line x1="10" x2="10" y1="11" y2="17" />
                                            <line x1="14" x2="14" y1="11" y2="17" />
                                        </svg>
                                    </label>
                                    <input class="modal-state" id="modal-delete-user-{{ $user->id }}"
                                        type="checkbox" />
                                    <div class="modal">
                                        <label class="modal-overlay" for="modal-delete-user-{{ $user->id }}"></label>
                                        <div class="modal-content flex flex-col gap-5 min-w-[512px]">
                                            <label for="modal-delete-user-{{ $user->id }}"
                                                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                            <h2 class="text-xl">Delete User's {{ $user->name }}</h2>
                                            <span>Are you sure destroy this user?</span>
                                            <div class="flex gap-3">
                                                <form action="{{ route('customer.destroy', $user) }}" method="POST"
                                                    class="w-full">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-error w-full">Delete</button>
                                                </form>
                                                <button class="btn btn-block">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="pagination justify-center">
                <button class="btn">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.2574 5.59165C11.9324 5.26665 11.4074 5.26665 11.0824 5.59165L7.25742 9.41665C6.93242 9.74165 6.93242 10.2667 7.25742 10.5917L11.0824 14.4167C11.4074 14.7417 11.9324 14.7417 12.2574 14.4167C12.5824 14.0917 12.5824 13.5667 12.2574 13.2417L9.02409 9.99998L12.2574 6.76665C12.5824 6.44165 12.5741 5.90832 12.2574 5.59165Z"
                            fill="#969696" />
                    </svg>
                </button>
                <button class="btn btn-active">1</button>
                <button class="btn">2</button>
                <button class="btn">3</button>
                <button class="btn">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.74375 5.2448C7.41875 5.5698 7.41875 6.0948 7.74375 6.4198L10.9771 9.65314L7.74375 12.8865C7.41875 13.2115 7.41875 13.7365 7.74375 14.0615C8.06875 14.3865 8.59375 14.3865 8.91875 14.0615L12.7437 10.2365C13.0687 9.91147 13.0687 9.38647 12.7437 9.06147L8.91875 5.23647C8.60208 4.9198 8.06875 4.9198 7.74375 5.2448Z"
                            fill="#969696" />
                    </svg>
                </button>
            </div> --}}
        </div>
    @endsection
