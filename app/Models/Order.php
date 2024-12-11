<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'number',
        'total_price',
        'status',
        'shipping_price',
        'address',
        'city',
        'province',
        'postal_code',
        'notes',
        'user_id',
        'province_id',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
{
    return $this->hasMany(OrderItem::class, 'order_id', 'id');
}


    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
