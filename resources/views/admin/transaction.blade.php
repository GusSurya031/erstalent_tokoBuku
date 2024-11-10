@extends('layouts.main')

@section('container')
    <div class="flex">
        <div class="w-1/5">
            @include('components.sidebar')
        </div>

        <div class="flex-1 p-6 gap-6 space-y-4">
            <h1 class="text-3xl font-bold">
                Transactions List
            </h1>
            <p class="text-gray-500">
                List of all transactions made by customers.
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
                                </div>

                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <div class="space-x-4 border-none">
                                    <input type="text" class="input" placeholder="Search for transaction ...">
                                    <button class="btn">Search</button>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Book ID</th>
                            <th>Transaction Date</th>
                            <th style="text-align: center">Amount</th>
                            <th style="text-align: center">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{$sale->id}}</td>
                                <td>{{$sale->book_id}}</td>
                                <td>{{ \Carbon\Carbon::parse($sale->sales_date)->format('d M Y')}}</td>
                                <td style="text-align: center">{{$sale->quantity}}</td>
                                <td style="text-align: center">Rp{{ number_format($sale->total_price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
