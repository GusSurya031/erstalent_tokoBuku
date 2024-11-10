<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cart_id', 'book_id', 'quantity'];

    // Relasi ke Cart
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    // Relasi ke Book
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
