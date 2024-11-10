@extends('layouts.main')

@section('container')
    <x-navbar />
    <section class="min-h-screen flex flex-col justify-center items-center">
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
        <div class="text-center px-4">
            <h1 class="text-5xl font-bold mb-4">A Book for Every Story of Your Life</h1>
            <p class="text-lg mb-6 max-w-3xl">
                Find books that not only fill your free time, but also touch your heart and inspire you. From
                captivating stories to enriching knowledge, we are here to help you find a read that suits your every
                mood and need.
            </p>
            <button class="btn">
                <a href="{{ route('books.index') }}">Explore Books</a>
            </button>
        </div>
    </section>
@endsection
