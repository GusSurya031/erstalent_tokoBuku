<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request, Book $book)
    {

        $quantity = $request->input('quantity', 1); // Jumlah buku yang ingin ditambahkan

        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Dapatkan keranjang atau buat baru jika belum ada
        $cart = $user->cart ?: $user->cart()->create();

        // Tambahkan buku ke keranjang
        $cart->addBook($book, $quantity);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke keranjang.');
    }

    public function viewCart()
    {
        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Dapatkan keranjang
        $cart = $user->cart;

        // dd($cart->items);

        if (!$cart) {
            return view('user.pages.cart', ['cartItems' => []])->with('message', 'Keranjang Anda kosong.');
        }

        return view('user.pages.cart', ['cartItems' => $cart->items]);
    }

    public function destroy(CartItem $cartItem)
    {
        // dd($cartItem);
        // Ambil jumlah item yang dihapus
        $quantity = $cartItem->quantity;

        // Akses buku terkait dan tambahkan stoknya
        $book = $cartItem->book; // Pastikan relasi ke Book sudah ada di model CartItem
        $book->stock += $quantity;
        $book->save();

        // Hapus item dari keranjang
        $cartItem->delete();

        return redirect()->back()->with('success', "Item successfully deleted and stock updated.");
    }
}
