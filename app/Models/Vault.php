<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Vault extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'expires_at',
        'order_id'
    ];

    protected $casts = [
        'expires_at' => 'datetime'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function available(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->order_id === null
        );
    }
}
