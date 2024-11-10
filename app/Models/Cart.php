<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id'];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke CartItem
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    // Fungsi menambahkan buku ke keranjang
    public function addBook(Book $book, $quantity)
    {
        $existingItem = $this->items()->where('book_id', $book->id)->first();

        if ($existingItem) {
            // Jika buku sudah ada di keranjang, tambahkan quantity
            $existingItem->quantity += $quantity;
            $existingItem->save();
        } else {
            // Jika belum ada, buat item baru
            $this->items()->create([
                'book_id' => $book->id,
                'quantity' => $quantity
            ]);
        }

        // Kurangi stok buku
        $book->decreaseStock($quantity);
    }
}
