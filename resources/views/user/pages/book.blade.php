@extends('layouts.main')

@section('container')
    <x-navbar/>
    <section class="min-h-screen flex flex-col justify-center items-center">
        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-center gap-8">
            <div class="flex flex-col p-7 sm:p-0 md:w-2/4 md:text-left space-y-10">
                <h2 class="font-semibold text-3xl md:text-4xl">How It Started</h2>
                <h1 class="text-4xl md:text-5xl font-bold">Our Passion for Books and Knowledge</h1>
                <p class="text-base w-3/4">
                    Book Haven was founded by avid readers, who shared a love for literature and learning.
                    Their mission was to create a space where book lovers could easily explore, discover, and purchase
                    their favorite reads. From timeless classics to modern bestsellers, Book Haven offers a wide
                    selection
                    of books to suit every reader's taste.
                </p>
            </div>
            <div class="flex flex-col w-full lg:w-1/3 relative space-y-8 p-7 sm:p-0">
                <img
                    src="https://img.freepik.com/free-vector/hand-drawn-flat-design-stack-books-illustration_23-2149341898.jpg?removebg=1"
                    alt="Bookstore" class="rounded-3xl">
            </div>
        </div>
    </section>
    <section class="min-h-screen flex flex-col items-center mb-32">
        <h1 class="text-4xl font-bold text-center mb-8">Our Bestsellers</h1>
        <p class="text-center text-lg mb-8 max-w-3xl mx-auto">
            Discover our top picks of the month. From thrilling mysteries to heartwarming romances, these books are
            guaranteed to keep you entertained.
        </p>
        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-center gap-8">
            <select class="select select-xl">
                <option value="" disabled selected>Book Category</option>
                <option value="fiction">Fiction</option>
                <option value="non-fiction">Non-Fiction</option>
                <option value="education">Education</option>
                <option value="history">History</option>
                <option value="biography">Biography</option>
            </select>

            <select class="select select-xl">
                <option value="" disabled selected>Book Type</option>
                <option value="print">Print</option>
                <option value="digital">Digital</option>
                <option value="audio">Audio</option>
            </select>

            <select class="select select-xl">
                <option value="" disabled selected>Publication Year</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
            </select>

            <select class="select select-xl">
                <option value="" disabled selected>Language</option>
                <option value="indonesian">Indonesian</option>
                <option value="english">English</option>
                <option value="japanese">Japanese</option>
                <option value="french">French</option>
                <option value="german">German</option>
            </select>
        </div>
        <div class="container mx-auto grid grid-cols-1 place-items-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8">
            {{-- {{dd($books)}} --}}
            @foreach ($books as $book)
            <div class="card transition-all bg-slate-100 shadow-sm border border-slate-200 hover:shadow-md card-image-cover cursor-pointer">
                <a href="{{route('books.show',$book->id)}}">
                    <div class="card-body">
                        <img
                            src="{{$book->image_url}}"
                            class="w-[300px] h-[400px]"
                            alt=""/>
                        <div class="card-title-group px-10 flex flex-col gap-2">
                            <h6 class="card-title text-2xl font-bold">{{$book->title}}</h6>
                            <p class="card-text text-gray-500">{{$book->author}}</p>
                            <div class="card-price font-bold text-gray-500 flex gap-3">
                                <p class="card-text text-gray-500">Rp. {{$book->price}}</p>
                                <p class="card-text text-gray-500 line-through">Rp 150.000</p>
                            </div>
                            <button class="btn btn-solid-primary">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

@endsection
