<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Menampilkan daftar penjualan beserta informasi buku dan user
    public function index()
    {
        // Mengambil semua penjualan dan melakukan eager loading pada relasi user dan book
        $sales = Sale::with(['user', 'book.category'])->get();

        // Mengirim data ke view
        return view('sales.index', compact('sales'));
    }

    // Menyimpan transaksi penjualan
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil data buku untuk menghitung total harga
        $book = Book::find($request->book_id);

        // Validasi jika buku tidak ditemukan
        if (!$book) {
            return redirect()->back()->withErrors(['error' => 'Buku tidak ditemukan']);
        }

        // Menghitung total harga transaksi
        $totalPrice = $book->price * $request->quantity;

        // Validasi jika stok buku tidak cukup
        if ($book->stock < $request->quantity) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak cukup']);
        }

        // Kurangi stok buku setelah penjualan
        $book->stock -= $request->quantity;
        $book->save();

        // Simpan data transaksi penjualan
        $sale = Sale::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'sales_date' => now(),
        ]);

        // Redirect ke halaman daftar penjualan dengan pesan sukses
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil disimpan.');
    }

    // Menampilkan halaman untuk mengedit transaksi penjualan
    public function edit($id)
    {
        // Ambil data transaksi penjualan berdasarkan ID dan eager load relasi
        $sale = Sale::with(['user', 'book.category'])->findOrFail($id);

        // Menampilkan form edit dengan data transaksi yang akan diubah
        return view('sales.edit', compact('sale'));
    }

    // Memperbarui transaksi penjualan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Mengambil data transaksi yang akan diupdate
        $sale = Sale::findOrFail($id);
        $book = Book::findOrFail($request->book_id);

        // Menghitung total harga baru berdasarkan jumlah buku yang akan dibeli
        $totalPrice = $book->price * $request->quantity;

        // Validasi jika stok buku tidak cukup
        if ($book->stock + $sale->quantity < $request->quantity) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak cukup untuk melakukan pembaruan']);
        }

        // Mengupdate stok buku setelah transaksi diperbarui
        $book->stock = $book->stock + $sale->quantity - $request->quantity;
        $book->save();

        // Perbarui transaksi penjualan
        $sale->update([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        // Redirect ke halaman daftar penjualan dengan pesan sukses
        return redirect()->route('sales.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus transaksi penjualan
    public function destroy($id)
    {
        // Mengambil data transaksi berdasarkan ID
        $sale = Sale::findOrFail($id);

        // Mengembalikan stok buku sesuai dengan jumlah yang terjual
        $book = $sale->book;
        $book->stock += $sale->quantity;
        $book->save();

        // Menghapus data transaksi penjualan
        $sale->delete();

        // Redirect ke halaman daftar penjualan dengan pesan sukses
        return redirect()->route('sales.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}