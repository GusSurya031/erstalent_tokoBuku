@extends('layouts.main')

@section('container')
    <div class="flex">
        <div class="w-1/5">
            @include('components.sidebar')
        </div>

        <div class="flex-1 p-6 gap-6 space-y-4">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <p class="text-gray-500">
                Welcome to the BookStore dashboard. Here you can manage all the data related to books, customers, and
                transactions.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="border rounded-lg p-6 text-center">
                    <h2 class="text-xl font-bold">Total Books</h2>
                    <p class="text-3xl font-bold">100</p>
                </div>
                <div class="border rounded-lg p-6 text-center">
                    <h2 class="text-xl font-bold">Total Customers</h2>
                    <p class="text-3xl font-bold">100</p>
                </div>
                <div class="border rounded-lg p-6 text-center">
                    <h2 class="text-xl font-bold">Total Transactions</h2>
                    <p class="text-3xl font-bold">100</p>
                </div>
            </div>
            <h2 class="text-3xl font-bold">Recent Transactions</h2>
            <p class="text-gray-500">
                Here are the recent transactions made by the customers.
            </p>
            <div class="flex w-full overflow-x-auto items-center">
                <table class="table-hover table">
                    <thead>
                    <tr>
                        <th>
                            <div class="flex border-none items-center">
                                <div class="dropdown-container justify-center" style="border: none">
                                    <div class="dropdown dropdown-hover" style="border: none">
                                        <label class="btn my-2" tabindex="0" style="border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="lucide lucide-filter opacity-75" style="border: none">
                                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
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
                                    <label class="btn" for="modal-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="opacity-75 border-none lucide lucide-square-plus">
                                            <rect width="18" height="18" x="3" y="3" rx="2"/>
                                            <path d="M8 12h8"/>
                                            <path d="M12 8v8"/>
                                        </svg>
                                        Add Book
                                    </label>

                                    <input class="modal-state" id="modal-1" type="checkbox"/>
                                    <div class="modal">
                                        <label class="modal-overlay" for="modal-1"></label>
                                        <div class="modal-content border-none flex w-full flex-col gap-5 p-7">
                                            <label for="modal-1"
                                                   class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                            <div class="flex flex-col gap-2 border-none">
                                                <h2 class="text-center text-2xl font-semibold">Sign In</h2>
                                                <p class="mx-auto max-w-xs text-sm text-content2">Sign in to your
                                                    account to continue.</p>
                                            </div>

                                            <section>
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <label class="form-label">Email address</label>
                                                        <input placeholder="Type here" type="email"
                                                               class="input max-w-full"/>
                                                        <label class="form-label">
                                                            <span
                                                                class="form-label-alt">Please enter a valid email.</span>
                                                        </label>
                                                    </div>

                                                    <div class="form-field">
                                                        <label class="form-label">
                                                            <span>Password</span>
                                                        </label>
                                                        <div class="form-control">
                                                            <input placeholder="Type here" type="password"
                                                                   class="input max-w-full"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-field">
                                                        <div class="form-control justify-between">
                                                            <div>
                                                                <input type="checkbox" class="checkbox"/>
                                                                <a href="#">Remember me</a>
                                                            </div>
                                                            <label class="form-label">
                                                                <a class="link link-underline-hover link-primary text-sm">Forgot
                                                                    your password?</a>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-field pt-5">
                                                        <div class="form-control justify-between">
                                                            <button type="button" class="btn btn-primary w-full">Sign
                                                                in
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divider text-sm">Login with social accounts</div>

                                                <div class="flex justify-center space-x-4">
                                                    <button type="button" aria-label="Log in with Google"
                                                            class="rounded-sm p-3">
                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                             version="1.1" viewBox="0 0 48 48"
                                                             enable-background="new 0 0 48 48" class="h-5 w-5"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                fill="#FFC107"
                                                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                    c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                    c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"
                                                            ></path>
                                                            <path
                                                                fill="#FF3D00"
                                                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                    C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"
                                                            ></path>
                                                            <path
                                                                fill="#4CAF50"
                                                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                    c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"
                                                            ></path>
                                                            <path
                                                                fill="#1976D2"
                                                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                    c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                    <button type="button" aria-label="Log in with Twitter"
                                                            class="rounded-sm p-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                             class="h-5 w-5 fill-primary">
                                                            <path
                                                                d="M31.937 6.093c-1.177 0.516-2.437 0.871-3.765 1.032 1.355-0.813 2.391-2.099 2.885-3.631-1.271 0.74-2.677 1.276-4.172 1.579-1.192-1.276-2.896-2.079-4.787-2.079-3.625 0-6.563 2.937-6.563 6.557 0 0.521 0.063 1.021 0.172 1.495-5.453-0.255-10.287-2.875-13.52-6.833-0.568 0.964-0.891 2.084-0.891 3.303 0 2.281 1.161 4.281 2.916 5.457-1.073-0.031-2.083-0.328-2.968-0.817v0.079c0 3.181 2.26 5.833 5.26 6.437-0.547 0.145-1.131 0.229-1.724 0.229-0.421 0-0.823-0.041-1.224-0.115 0.844 2.604 3.26 4.5 6.14 4.557-2.239 1.755-5.077 2.801-8.135 2.801-0.521 0-1.041-0.025-1.563-0.088 2.917 1.86 6.36 2.948 10.079 2.948 12.067 0 18.661-9.995 18.661-18.651 0-0.276 0-0.557-0.021-0.839 1.287-0.917 2.401-2.079 3.281-3.396z"></path>
                                                        </svg>
                                                    </button>
                                                    <button type="button" aria-label="Log in with GitHub"
                                                            class="rounded-sm p-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                             class="h-5 w-5 fill-current">
                                                            <path
                                                                d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div
                                                    class="items-center justify-center text-xs dark:text-gray-5 sm:px-6 flex gap-2">
                                                    <span>Don't have an account?</span>
                                                    <a rel="noopener noreferrer" href="#"
                                                       class="link link-primary text-xs">Sign up</a>
                                                </div>
                                            </section>
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
                            <div class="space-x-4 border-none">
                                <input type="text" class="input" placeholder="Search for books ...">
                                <button class="btn">Search</button>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Laut Bercerita</td>
                        <td>Leila S. Chudori</td>
                        <td>Novel</td>
                        <td>10</td>
                        <td>Rp.100.000</td>
                        <td style="text-align: center">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-square-plus">
                                    <rect width="18" height="18" x="3" y="3" rx="2"/>
                                    <path d="M8 12h8"/>
                                    <path d="M12 8v8"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Laut Bercerita</td>
                        <td>Leila S. Chudori</td>
                        <td>Novel</td>
                        <td>10</td>
                        <td>Rp.100.000</td>
                        <td style="text-align: center">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-square-plus">
                                    <rect width="18" height="18" x="3" y="3" rx="2"/>
                                    <path d="M8 12h8"/>
                                    <path d="M12 8v8"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Laut Bercerita</td>
                        <td>Leila S. Chudori</td>
                        <td>Novel</td>
                        <td>10</td>
                        <td>Rp.100.000</td>
                        <td style="text-align: center">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-square-plus">
                                    <rect width="18" height="18" x="3" y="3" rx="2"/>
                                    <path d="M8 12h8"/>
                                    <path d="M12 8v8"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Laut Bercerita</td>
                        <td>Leila S. Chudori</td>
                        <td>Novel</td>
                        <td>10</td>
                        <td>Rp.100.000</td>
                        <td style="text-align: center">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-square-plus">
                                    <rect width="18" height="18" x="3" y="3" rx="2"/>
                                    <path d="M8 12h8"/>
                                    <path d="M12 8v8"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Laut Bercerita</td>
                        <td>Leila S. Chudori</td>
                        <td>Novel</td>
                        <td>10</td>
                        <td>Rp.100.000</td>
                        <td style="text-align: center">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-square-plus">
                                    <rect width="18" height="18" x="3" y="3" rx="2"/>
                                    <path d="M8 12h8"/>
                                    <path d="M12 8v8"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination justify-center">
                <button class="btn">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12.2574 5.59165C11.9324 5.26665 11.4074 5.26665 11.0824 5.59165L7.25742 9.41665C6.93242 9.74165 6.93242 10.2667 7.25742 10.5917L11.0824 14.4167C11.4074 14.7417 11.9324 14.7417 12.2574 14.4167C12.5824 14.0917 12.5824 13.5667 12.2574 13.2417L9.02409 9.99998L12.2574 6.76665C12.5824 6.44165 12.5741 5.90832 12.2574 5.59165Z"
                              fill="#969696"/>
                    </svg>
                </button>
                <button class="btn btn-active">1</button>
                <button class="btn">2</button>
                <button class="btn">3</button>
                <button class="btn">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.74375 5.2448C7.41875 5.5698 7.41875 6.0948 7.74375 6.4198L10.9771 9.65314L7.74375 12.8865C7.41875 13.2115 7.41875 13.7365 7.74375 14.0615C8.06875 14.3865 8.59375 14.3865 8.91875 14.0615L12.7437 10.2365C13.0687 9.91147 13.0687 9.38647 12.7437 9.06147L8.91875 5.23647C8.60208 4.9198 8.06875 4.9198 7.74375 5.2448Z"
                              fill="#969696"/>
                    </svg>
                </button>
            </div>
        </div>
@endsection
