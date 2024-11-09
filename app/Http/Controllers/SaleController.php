<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel sales beserta data user dan book terkait
        $sales = Sale::with(['user', 'book'])->get();

        // Mengirim data sales ke view 'sales.index'
        return view('sales.index', compact('sales'));
    }

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

        if (!$book) {
            return redirect()->back()->withErrors(['error' => 'Buku tidak ditemukan']);
        }

        $totalPrice = $book->price * $request->quantity;

        // Kurangi stok buku
        if ($book->stock < $request->quantity) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak cukup']);
        }

        $book->stock -= $request->quantity;
        $book->save();

        // Simpan transaksi penjualan
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

}