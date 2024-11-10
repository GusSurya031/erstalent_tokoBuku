<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'publisher',
        'summary',
        'price',
        'stock',
        'image_url'
    ];

    // Relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function books()
    {
        return $this->hasMany(Sale::class);
    }

    // Fungsi untuk mengurangi stok
    public function decreaseStock($quantity)
    {
        $this->stock -= $quantity;
        $this->save();
    }
}
