@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Daftar Penjualan</h1>
        <a href="{{ route('sales.create') }}" class="btn btn-success mb-3">Tambah Penjualan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $index => $sale)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $sale->user->name }}</td>
                        <td>{{ $sale->book->title }}</td>
                        <td>{{ $sale->book->category->category_name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ number_format($sale->total_price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
