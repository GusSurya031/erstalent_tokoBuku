<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Sale;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    // public function index()
    // {
    //     // Ambil semua data penjualan beserta relasi user dan book
    //     $sales = Sale::with(['user', 'book', 'book.category'])->get();
    //     return view('sale', compact('sales')); // Mengarah ke file sale.blade.php
    // }


    // public function create()
    // {
    //     $books = Book::all(); // Ambil semua buku
    //     $users = User::all(); // Ambil semua user
    //     return view('create', compact('books', 'users')); // Mengarah ke file create.blade.php
    // }

    // public function store(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'book_id' => 'required|exists:books,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     // Ambil data buku untuk menghitung total harga
    //     $book = Book::find($request->book_id);

    //     if (!$book) {
    //         return response()->json(['error' => 'Buku tidak ditemukan'], 404);
    //     }

    //     // Cek jika stok cukup
    //     if ($book->stock < $request->quantity) {
    //         // Jika stok tidak cukup, kirimkan error
    //         return redirect()->back()->with('error', 'Stok buku tidak cukup');
    //     }

    //     $totalPrice = $book->price * $request->quantity;

    //     // Kurangi stok buku
    //     $book->stock -= $request->quantity;
    //     $book->save();

    //     // Simpan transaksi penjualan
    //     $sale = Sale::create([
    //         'user_id' => $request->user_id,
    //         'book_id' => $request->book_id,
    //         'quantity' => $request->quantity,
    //         'total_price' => $totalPrice,
    //         'sales_date' => now(),
    //     ]);

    //     // Kembalikan response sukses
    //     return redirect()->route('sales.index')->with('success', 'Penjualan berhasil');
    // }

    // public function edit($id)
    // {
    //     $sale = Sale::findOrFail($id);
    //     $books = Book::all(); // Ambil semua buku
    //     $users = User::all(); // Ambil semua user
    //     return view('edit', compact('sale', 'books', 'users')); // Mengarah ke file edit.blade.php
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     // Ambil data penjualan yang ingin diupdate
    //     $sale = Sale::find($id);

    //     if (!$sale) {
    //         return redirect()->route('sales.index')->with('error', 'Transaksi penjualan tidak ditemukan');
    //     }

    //     // Ambil data buku terkait dengan penjualan ini
    //     $book = $sale->book;

    //     // Hitung selisih antara jumlah yang baru dengan jumlah yang lama
    //     $quantityDifference = $request->quantity - $sale->quantity;

    //     // Pengecekan apakah stok buku cukup
    //     if ($book->stock < $quantityDifference) {
    //         // Jika stok tidak cukup, kembalikan ke halaman edit dengan pesan error
    //         return redirect()->back()->withErrors(['quantity' => 'Stok buku tidak cukup untuk jumlah yang diupdate.'])->withInput();
    //     }

    //     // Update stok buku (tambahkan jumlah yang sudah kembali, kurangi jumlah yang baru)
    //     $book->stock = $book->stock + $sale->quantity - $request->quantity;
    //     $book->save();

    //     // Update transaksi penjualan
    //     $sale->quantity = $request->quantity;
    //     $sale->total_price = $book->price * $request->quantity;
    //     $sale->save();

    //     // Redirect ke halaman index dengan pesan sukses
    //     return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diperbarui');
    // }

    // public function destroy($id)
    // {
    //     $sale = Sale::findOrFail($id);
    //     $book = Book::find($sale->book_id);
    //     $book->stock += $sale->quantity; // Mengembalikan stok buku yang terjual
    //     $book->save();

    //     $sale->delete();

    //     return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus');
    // }

    public function buyNow(Request $request, Book $book)
    {
        $user = auth()->user();
        $quantity = $request->input('quantity', 1); // Jumlah yang ingin dibeli (default 1)

        // Periksa apakah stok mencukupi
        if ($book->stock < $quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk jumlah yang ingin Anda beli.');
        }

        DB::beginTransaction();
        try {
            // Hitung total harga
            $totalPrice = $book->price * $quantity;

            // Simpan transaksi ke dalam tabel Sale
            Sale::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'sales_date' => Carbon::now(),
            ]);

            // Kurangi stok buku
            $book->stock -= $quantity;
            $book->save();

            DB::commit();
            return redirect()->route('home')->with('success', 'Pembelian berhasil. Terima kasih!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pembelian. Silakan coba lagi.');
        }
    }

    public function buyCart(Request $request)
    {
        // Ambil item yang dipilih dari input 'selectedItems' dan decode JSON-nya
        $selectedItems = json_decode($request->input('selectedItems'), true);

        // Ambil user yang sedang login
        $user = auth()->user();

        DB::beginTransaction();
        try {
            foreach ($selectedItems as $itemId) {
                // Ambil CartItem berdasarkan ID yang dipilih
                $cartItem = CartItem::findOrFail($itemId);
                $book = $cartItem->book;
                $quantity = $cartItem->quantity;

                // Periksa apakah stok mencukupi
                if ($book->stock < $quantity) {
                    return redirect()->back()->with('error', "Stok untuk {$book->title} tidak mencukupi.");
                }

                // Simpan transaksi ke dalam tabel Sale
                Sale::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'quantity' => $quantity,
                    'total_price' => $book->price * $quantity,
                    'sales_date' => Carbon::now(),
                ]);

                // Kurangi stok buku
                $book->stock -= $quantity;
                $book->save();

                // Hapus item dari keranjang setelah diproses
                $cartItem->delete();
            }

            DB::commit();
            return redirect()->route('home')->with('success', 'Checkout berhasil. Terima kasih atas pembelian Anda.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat checkout. Silakan coba lagi.');
        }
    }
}
