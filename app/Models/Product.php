<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'description',
        'image',
        'stock',
        'backorder',
        'requires_shipping',
        'published_at',
        'is_visible',
        'slug',
    ];

    // Relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relasi dengan model OrderDetail (purchase details)
    public function purchaseDetails()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    // Akses Custom: Mendapatkan Harga dalam Format Rupiah
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    // Akses Custom: Menyediakan Status Stok
    public function getStockStatusAttribute()
    {
        return $this->stock > 0 ? 'In Stock' : 'Out of Stock';
    }
}
