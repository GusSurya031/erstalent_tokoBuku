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
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <p class="text-gray-500">
                Welcome to the BookStore dashboard. Here you can manage all the data related to books, customers, and
                transactions.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="border rounded-lg p-6 text-center">
                    <h2 class="text-xl font-bold">Total Books</h2>
                    <p class="text-3xl font-bold">{{ $books->count() }}</p>
                </div>
                <div class="border rounded-lg p-6 text-center">
                    <h2 class="text-xl font-bold">Total Customers</h2>
                    <p class="text-3xl font-bold">{{ $users->count() }}</p>
                </div>
                <div class="border rounded-lg p-6 text-center">
                    <h2 class="text-xl font-bold">Total Transactions</h2>
                    <p class="text-3xl font-bold">{{ $transactions->count() }}</p>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-3xl font-bold">Books </h2>
                <p class="text-gray-500">
                    Here are the books in directory
                </p>
                <div class="flex w-full overflow-x-auto items-center">
                    <table class="table table-hover ">
                        <thead>
                            <tr class="border-b-0">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="opacity-75 border-none lucide lucide-square-plus">
                                                    <rect width="18" height="18" x="3" y="3" rx="2" />
                                                    <path d="M8 12h8" />
                                                    <path d="M12 8v8" />
                                                </svg>
                                                Add Book
                                            </label>

                                            <input class="modal-state" id="modal-book" type="checkbox" />
                                            <div class="modal">
                                                <label class="modal-overlay" for="modal-book"></label>
                                                <div
                                                    class="modal-content ring-0 flex w-full flex-col gap-5 p-7 min-w-[800px]">
                                                    <label for="modal-book"
                                                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                                    <h2 class="text-xl">Add New Book</h2>
                                                    <form action="{{ route('books.store') }}" method="POST"
                                                        enctype="multipart/form-data"
                                                        class="grid grid-cols-1 md:grid-cols-2 gap-4 space-y-4 md:space-y-0">
                                                        @csrf
                                                        <div class="col-span-1">
                                                            <label for="title"
                                                                class="block text-sm font-medium text-gray-700">Title</label>
                                                            <input type="text" name="title" required
                                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                                placeholder="Type here">
                                                        </div>

                                                        <div class="col-span-1">
                                                            <label for="author"
                                                                class="block text-sm font-medium text-gray-700">Author</label>
                                                            <input type="text" name="author" required
                                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                                placeholder="Type here">
                                                        </div>

                                                        <div class="col-span-1">
                                                            <label for="publisher"
                                                                class="block text-sm font-medium text-gray-700">Publisher</label>
                                                            <input type="text" name="publisher" required
                                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                                placeholder="Type here">
                                                        </div>

                                                        <div class="col-span-1">
                                                            <label for="price"
                                                                class="block text-sm font-medium text-gray-700">Price</label>
                                                            <input type="number" name="price" step="0.01" required
                                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                                placeholder="Type here">
                                                        </div>

                                                        <div class="col-span-1">
                                                            <label for="stock"
                                                                class="block text-sm font-medium text-gray-700">Stock</label>
                                                            <input type="number" name="stock" required
                                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                                placeholder="Type here">
                                                        </div>

                                                        <div class="col-span-1">
                                                            <label for="category_id"
                                                                class="block text-sm font-medium text-gray-700">Category</label>
                                                            <select name="category_id" required
                                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                                <option value="" hidden>-Select Category-</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-span-1 md:col-span-2">
                                                            <label for="summary"
                                                                class="block text-sm font-medium text-gray-700">Summary</label>
                                                            <textarea name="summary" required rows="3"
                                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                                placeholder="Type here"></textarea>
                                                        </div>

                                                        <div class="col-span-1 md:col-span-2">
                                                            <label for="image"
                                                                class="block text-sm font-medium text-gray-700">Upload
                                                                Image</label>
                                                            <input type="file" accept="image/*" name="image"
                                                                class="mt-1 block w-full text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('image') is-invalid @enderror">
                                                            @error('image')
                                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-span-1 md:col-span-2">
                                                            <button type="submit"
                                                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Add
                                                                Book</button>
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
                            @foreach ($books as $book)
                                <tr>
                                    <td class="flex items-center">
                                        <img src="{{ $book->image_url }}" alt="" class="w-24">
                                        <p>{{ $book->title }}</p>
                                    </td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->category->category_name }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td>Rp{{ number_format($book->price, 0, ',', '.') }}</td>
                                    <td style="text-align: center">
                                        <label class="btn btn-primary" for="modal-{{ $book->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-pencil">
                                                <path
                                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                <path d="m15 5 4 4" />
                                            </svg>
                                        </label>
                                        <input class="modal-state" id="modal-{{ $book->id }}" type="checkbox" />
                                        <div class="modal">
                                            <label class="modal-overlay" for="modal-{{ $book->id }}"></label>
                                            <div class="modal-content ring-0 flex w-full flex-col gap-5 p-7 min-w-[800px]">
                                                <label for="modal-{{ $book->id }}"
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                                <h2 class="text-xl">Edit Book</h2>
                                                <form action="{{ route('books.update', $book->id) }}" method="POST"
                                                    enctype="multipart/form-data"
                                                    class="grid grid-cols-1 md:grid-cols-2 gap-4 space-y-4 md:space-y-0">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-span-1">
                                                        <label for="title"
                                                            class="block text-sm font-medium text-gray-700">Title</label>
                                                        <input type="text" name="title" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="Type here" value="{{ $book->title }}">
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="author"
                                                            class="block text-sm font-medium text-gray-700">Author</label>
                                                        <input type="text" name="author" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="Type here" value="{{ $book->author }}">
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="publisher"
                                                            class="block text-sm font-medium text-gray-700">Publisher</label>
                                                        <input type="text" name="publisher" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="Type here" value="{{ $book->publisher }}">
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="price"
                                                            class="block text-sm font-medium text-gray-700">Price</label>
                                                        <input type="number" name="price" step="0.01" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="Type here" value="{{ $book->price }}">
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="stock"
                                                            class="block text-sm font-medium text-gray-700">Stock</label>
                                                        <input type="number" name="stock" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="Type here" value="{{ $book->stock }}">
                                                    </div>

                                                    <div class="col-span-1">
                                                        <label for="category_id"
                                                            class="block text-sm font-medium text-gray-700">Category</label>
                                                        <select name="category_id" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                            <option value="" hidden>-Select Category-</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if ($book->category_id == $category->id) selected @endif>
                                                                    {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-span-1 md:col-span-2">
                                                        <label for="summary"
                                                            class="block text-sm font-medium text-gray-700">Summary</label>
                                                        <textarea name="summary" required rows="3"
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="">{{ $book->summary }}</textarea>
                                                    </div>

                                                    <div class="col-span-1 md:col-span-2 flex">
                                                        <div>
                                                            <label for="image"
                                                                class="block text-sm font-medium text-gray-700">Upload
                                                                Image</label>
                                                            <input type="file" accept="image/*" name="image"
                                                                class="mt-1 block w-full text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('image') is-invalid @enderror">
                                                            @error('image')
                                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <img src="{{ $book->image_url }}" alt=""
                                                                class="w-12">
                                                        </div>
                                                    </div>

                                                    <div class="col-span-1 md:col-span-2">
                                                        <button type="submit"
                                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Update
                                                            Book</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <label class="btn btn-error" for="modal-delete-{{ $book->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </label>
                                        <input class="modal-state" id="modal-delete-{{ $book->id }}"
                                            type="checkbox" />
                                        <div class="modal">
                                            <label class="modal-overlay" for="modal-delete-{{ $book->id }}"></label>
                                            <div class="modal-content flex flex-col gap-5 min-w-[512px]">
                                                <label for="modal-delete-{{ $book->id }}"
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                                <h2 class="text-xl">Delete Book's {{ $book->title }}</h2>
                                                <span>Are you sure destroy this book?</span>
                                                <div class="flex gap-3">
                                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                        class="w-full">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-error w-full">Delete</button>
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
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-3xl font-bold">Category </h2>
                <p class="text-gray-500">
                    Here are the category in directory
                </p>
                <div class="flex w-full overflow-x-auto items-center">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>
                                    <article class="border-none">
                                        <label class="btn" for="modal-add-category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="opacity-75 border-none lucide lucide-square-plus">
                                                <rect width="18" height="18" x="3" y="3" rx="2" />
                                                <path d="M8 12h8" />
                                                <path d="M12 8v8" />
                                            </svg>
                                            Add Book
                                        </label>

                                        <input class="modal-state" id="modal-add-category" type="checkbox" />
                                        <div class="modal">
                                            <label class="modal-overlay" for="modal-add-category"></label>
                                            <div class="modal-content ring-0 flex w-full flex-col gap-5 p-7 min-w-[800px]">
                                                <label for="modal-add-category"
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                                <h2 class="text-xl">Add New Book</h2>
                                                <form action="{{ route('categories.store') }}" method="POST"
                                                    class="flex flex-col space-y-4">
                                                    @csrf
                                                    <div class="col-span-1">
                                                        <label for="title"
                                                            class="block text-sm font-medium text-gray-700">Name</label>
                                                        <input type="text" name="category_name" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="Type here" value="">
                                                    </div>

                                                    <div class="col-span-1 md:col-span-2">
                                                        <button type="submit"
                                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Add
                                                            category</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </article>
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td style="text-align: center">
                                        <label class="btn btn-primary" for="modal-category-{{ $category->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-pencil">
                                                <path
                                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                <path d="m15 5 4 4" />
                                            </svg>
                                        </label>
                                        <input class="modal-state" id="modal-category-{{ $category->id }}"
                                            type="checkbox" />
                                        <div class="modal">
                                            <label class="modal-overlay"
                                                for="modal-category-{{ $category->id }}"></label>
                                            <div class="modal-content ring-0 flex w-full flex-col gap-5 p-7 min-w-[800px]">
                                                <label for="modal-category-{{ $category->id }}"
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                                <h2 class="text-xl">Edit category</h2>
                                                <form action="{{ route('categories.update', $category->id) }}"
                                                    method="POST" class="flex flex-col space-y-4">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-span-1">
                                                        <label for="title"
                                                            class="block text-sm font-medium text-gray-700">Name</label>
                                                        <input type="text" name="category_name" required
                                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                                            placeholder="Type here"
                                                            value="{{ $category->category_name }}">
                                                    </div>

                                                    <div class="col-span-1 md:col-span-2">
                                                        <button type="submit"
                                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Update
                                                            category</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <label class="btn btn-error" for="modal-delete-category-{{ $category->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </label>
                                        <input class="modal-state" id="modal-delete-category-{{ $category->id }}"
                                            type="checkbox" />
                                        <div class="modal">
                                            <label class="modal-overlay"
                                                for="modal-delete-category-{{ $category->id }}"></label>
                                            <div class="modal-content flex flex-col gap-5 min-w-[512px]">
                                                <label for="modal-delete-category-{{ $category->id }}"
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                                                <h2 class="text-xl">Delete category's {{ $category->category_name }}</h2>
                                                <span>Are you sure destroy this category?</span>
                                                <div class="flex gap-3">
                                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                                        method="POST" class="w-full">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-error w-full">Delete</button>
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
            </div>
        </div>
    @endsection
