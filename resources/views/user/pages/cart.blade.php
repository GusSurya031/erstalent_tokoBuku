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
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Bagian Daftar Keranjang -->
        <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Keranjang</h2>

            <!-- Header Pilih Semua -->
            <div class="flex items-center mb-4">
                <input type="checkbox" class="mr-2" onclick="selectAll(this)">
                <span class="text-gray-700">All</span>
            </div>
            <hr class="mb-4">

            <!-- Item Keranjang -->
            @foreach ($cartItems as $item)
                <div class="flex items-center mb-4 p-4 rounded-lg border border-gray-200">
                    <input type="checkbox" class="mr-4 item-checkbox" data-id="{{ $item->id }}"
                        data-price="{{ $item->book->price }}" onclick="toggleCheckoutButton()">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $item->book->image_url }}" alt="Book Cover" class="w-16 h-20 object-cover">
                        <div>
                            <h3 class="font-semibold">{{ $item->book->title }}</h3>
                            <span class="text-sm text-gray-500">{{ $item->book->author }}</span>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="text-red-500 font-bold">Rp{{ number_format($item->book->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="ml-auto flex items-center space-x-4">
                        <div class="flex items-center">
                            <button onclick="decreaseQuantity(this)"
                                class="px-2 py-1 border border-gray-300 text-gray-700 rounded-l hover:bg-gray-200">-</button>
                            <input type="number" value="{{ $item->quantity }}" min="1"
                                class="w-12 text-center border-t border-b border-gray-300 focus:outline-none item-quantity"
                                data-price="{{ $item->book->price }}" onchange="calculateTotal()">
                            <button onclick="increaseQuantity(this)"
                                class="px-2 py-1 border border-gray-300 text-gray-700 rounded-r hover:bg-gray-200">+</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Ringkasan Keranjang dan Checkout -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold mb-4">Ringkasan Keranjang</h3>
            <div class="flex justify-between mb-2">
                <span class="text-gray-700">Total Harga</span>
                <span id="total-price" class="text-gray-700">Rp0</span>
            </div>
            <hr class="mb-4">
            <div class="flex justify-between text-lg font-bold">
                <span>Subtotal</span>
                <span id="subtotal" class="text-gray-700">Rp0</span>
            </div>

            <!-- Tombol Checkout -->
            <form id="checkoutForm" action="{{ route('sale.buyCart') }}" method="POST">
                @csrf
                <input type="hidden" name="selectedItems" id="selectedItems">
                <button type="button" onclick="submitCheckout()" id="checkoutButton" disabled
                    class="w-full bg-blue-600 text-white text-center py-2 rounded-lg mt-6 hover:bg-blue-700 disabled:opacity-50">
                    Checkout
                </button>
            </form>
        </div>
    </div>

    <script>
        // Mengaktifkan atau menonaktifkan tombol Checkout berdasarkan item yang dicentang
        function toggleCheckoutButton() {
            calculateTotal();
            const checkboxes = document.querySelectorAll('.item-checkbox:checked');
            const checkoutButton = document.getElementById('checkoutButton');
            checkoutButton.disabled = checkboxes.length === 0; // Aktifkan jika ada item yang dicentang
        }

        // Fungsi untuk submit form Checkout
        function submitCheckout() {
            const selectedItems = Array.from(document.querySelectorAll('.item-checkbox:checked'))
                .map(checkbox => checkbox.getAttribute('data-id')); // Ambil ID item yang dipilih
            document.getElementById('selectedItems').value = JSON.stringify(selectedItems); // Masukkan ke hidden input

            // Submit form
            document.getElementById('checkoutForm').submit();
        }

        // Fungsi Pilih Semua
        function selectAll(checkbox) {
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            itemCheckboxes.forEach(item => {
                item.checked = checkbox.checked;
            });
            toggleCheckoutButton();
        }

        function decreaseQuantity(button) {
            const quantityInput = button.nextElementSibling;
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                calculateTotal();
            }
        }

        function increaseQuantity(button) {
            const quantityInput = button.previousElementSibling;
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            calculateTotal();
        }

        function calculateTotal() {
            let totalPrice = 0;
            let subtotal = 0;

            document.querySelectorAll('.item-checkbox:checked').forEach((checkbox) => {
                const quantityInput = checkbox.closest('.flex').querySelector('.item-quantity');
                const price = parseFloat(checkbox.getAttribute('data-price'));
                const quantity = parseInt(quantityInput.value);

                totalPrice += price * quantity;
            });

            subtotal = totalPrice;

            document.getElementById('total-price').textContent = `Rp${totalPrice.toLocaleString()}`;
            document.getElementById('subtotal').textContent = `Rp${subtotal.toLocaleString()}`;
        }

        function selectAll(checkbox) {
            document.querySelectorAll('.item-checkbox').forEach((item) => {
                item.checked = checkbox.checked;
            });
            calculateTotal();
        }

        function removeItem(button, itemId) {
            // Logika untuk menghapus item dari keranjang
            console.log(`Menghapus item dengan ID ${itemId}`);
            button.closest('.flex').remove();
            calculateTotal();
        }

        // Hitung total saat halaman dimuat
        document.addEventListener('DOMContentLoaded', calculateTotal);
    </script>
@endsection
