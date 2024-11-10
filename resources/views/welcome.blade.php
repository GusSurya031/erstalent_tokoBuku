@extends('layouts.main')

@section('container')
    <x-navbar />
    <section class="min-h-screen flex justify-center items-center">
        <div class="text-center px-4">
            <h1 class="text-5xl font-bold mb-4">A Book for Every Story of Your Life</h1>
            <p class="text-lg mb-6 max-w-3xl">
                Find books that not only fill your free time, but also touch your heart and inspire you. From
                captivating stories to enriching knowledge, we are here to help you find a read that suits your every
                mood and need.
            </p>
            <button class="btn">
                <a href="/book">Explore Books</a>
            </button>
            <button class="btn">Learn More</button>
        </div>
    </section>
@endsection
