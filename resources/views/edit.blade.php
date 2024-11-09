@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Edit Penjualan</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">Pilih User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id == $sale->user_id) selected @endif>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="book_id">Pilih Buku</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" @if ($book->id == $sale->book_id) selected @endif>
                            {{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                    value="{{ $sale->quantity }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Penjualan</button>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali ke Daftar Penjualan</a>
        </form>
    </div>
@endsection
