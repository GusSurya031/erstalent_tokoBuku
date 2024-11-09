@extends('layouts.main')

@section('container')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Tambah Penjualan Baru</h1>

        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Pilih User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="book_id">Pilih Buku</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan Penjualan</button>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali ke Daftar Penjualan</a>
        </form>
    </div>
@endsection
