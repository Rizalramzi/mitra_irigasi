<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'user_id',
        'visitor_name',
        'visitor_phone',
        'visitor_email',
        'visitor_address',
        'visitor_purpose',
        'subtotal',
        'discount_percent',
        'total_price',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'subtotal' => 'float',
        'discount_percent' => 'float',
        'total_price' => 'float',
    ];

    public function getDiscountAmountAttribute(): float
    {
        if (!$this->subtotal || !$this->discount_percent) {
            return 0.0;
        }

        return round($this->subtotal * ($this->discount_percent / 100), 2);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}