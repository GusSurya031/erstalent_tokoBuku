@extends('layouts.main')

@section('container')
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            /* margin: 0; */
        }
    </style>
    <x-navbar />
    <section class="flex flex-col items-center relative">
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
                    {{session('success')}}
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
        <div class="breadcrumbs text-base my-4">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('books.index') }}">Books</a>
                </li>
                <li>
                    <p>{{ $book->title }}</p>
                </li>
            </ul>
        </div>

        <div class="container mx-auto flex flex-col lg:flex-row  justify-evenly gap-2">
            <div class="flex flex-col w-full lg:w-1/3 relative space-y-8 p-7 sm:p-0">
                <img src="{{ $book->image_url }}" alt="Bookstore" class="rounded-3xl">
            </div>
            <div class="flex flex-col p-7 sm:p-0 md:w-2/4 md:text-left space-y-2 justify-between" style="height: 100%">
                <h2 class="font-semibold text-3xl md:text-4xl">{{ $book->title }}</h2>
                <h1 class="text-4xl md:text-5xl font-bold">{{ $book->author }}</h1>
                <p class="text-2xl">Rp{{ number_format($book->price, 0, ',', '.') }}</p>
                <p class="text-base">Stok Tersedia : {{ $book->stock }}</p>
                <div>
                    <p class="font-semibold">Deskripsi</p>
                    <p class="text-base text-justify">
                        {{ $book->summary }}
                    </p>

                </div>
                <div>
                    <form id="cartForm" action="{{ route('cart.store', $book) }}" method="POST"
                        class="bg-slate-100/40 p-6 rounded-lg border border-slate-400 flex flex-col justify-end">
                        @csrf
                        <div class="flex flex-col justify-end mb-4">
                            <label for="quantity" class="text-sm font-medium text-gray-700">Quantity</label>
                            <div class="flex items-center mt-2">
                                <button type="button" onclick="decreaseQuantity()"
                                    class="px-3 py-2 bg-gray-200 text-gray-700 rounded-l-md focus:outline-none hover:bg-gray-300">-</button>
                                <input type="number" name="quantity" id="quantity"
                                    class="w-16 text-center border-t border-b border-gray-200 focus:outline-none"
                                    value="1" min="1">
                                <button type="button" onclick="increaseQuantity()"
                                    class="px-3 py-2 bg-gray-200 text-gray-700 rounded-r-md focus:outline-none hover:bg-gray-300">+</button>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <!-- Tombol Add to Cart -->
                            <button type="submit"
                                class="text-slate-700 border border-slate-700 hover:shadow-lg focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                Add to Cart
                            </button>

                            <!-- Tombol Buy Now -->
                            <button type="button" onclick="buyNow()"
                                class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-blue-800">
                                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 21">
                                    <path
                                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                </svg>
                                Buy now
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>

    <script>
        const stock = {{ $book->stock }};
        const quantityInput = document.getElementById('quantity');

        function decreaseQuantity() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        function increaseQuantity() {
            let currentValue = parseInt(quantityInput.value);
            // Pastikan kuantitas tidak melebihi stok
            if (currentValue < stock) {
                quantityInput.value = currentValue + 1;
            }
        }


        // Mencegah input langsung di field kuantitas melebihi stok
        quantityInput.addEventListener('input', function() {
            let value = parseInt(quantityInput.value);
            if (value > stock) {
                quantityInput.value = stock;
            }
        });

        function buyNow() {
            const form = document.getElementById('cartForm');
            const quantity = document.getElementById('quantity').value;

            // Ubah `action` form ke route `sale.buyNow`
            form.action = "{{ route('sale.buyNow', ['book' => $book->id]) }}";

            // Set `quantity` jika perlu (sudah ada dalam form)
            form.querySelector('input[name="quantity"]').value = quantity;

            // Submit form
            form.submit();
        }
        function hideToast() {
            const toast = document.getElementById('toast');
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        }

        function closeToast() {
            const toast = document.getElementById('toast');
            toast.style.display = 'none';
        }

    </script>
@endsection
