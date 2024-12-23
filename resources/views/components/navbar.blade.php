<section class="p-5 font-bold">
    <div class="navbar">
        <div class="navbar-start">
            <a href="/" class="navbar-item text-2xl font-bold">BookStore.</a>
        </div>
        {{-- <div class="navbar-center hidden lg:flex space-x-4">
            <input type="text" class="input" placeholder="Search for books ...">
            <button class="btn">Search</button>
        </div> --}}

        @if (Auth::check() && Auth::user()->roles->role_name == 'USER')
            <div class="navbar-end">
                <div class="avatar avatar-ring avatar-md">
                    <div class="dropdown-container">
                        <div class="dropdown">
                            <label class="btn btn-ghost flex cursor-pointer px-0" tabindex="0">
                                <img src="https://i.pravatar.cc/150?u=a042581f4e29026024d" alt="avatar" />
                            </label>
                            <div class="dropdown-menu dropdown-menu-bottom-left">
                                <a class="dropdown-item text-sm" href="{{route('books.index')}}">Books</a>
                                <a tabindex="-1" class="dropdown-item text-sm" href="{{route('cart.view')}}">Cart</a>
                                <a tabindex="-1" class="dropdown-item text-sm">
                                    <form action="{{ route('dashboard.logout') }}" method="post">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="navbar-end space-x-3">
                <button class="btn">
                    <a href="/cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-shopping-cart">
                            <circle cx="8" cy="21" r="1" />
                            <circle cx="19" cy="21" r="1" />
                            <path
                                d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                        </svg>
                    </a>
                </button>
                <button class="btn">
                    <a href="{{ route('login') }}">Login</a>
                </button>
                <button class="btn">
                    <a href="{{ route('register.index') }}">Register</a>
                </button>
            </div>
        @endif
    </div>
</section>
