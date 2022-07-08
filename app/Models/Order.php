<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->using(OrderProduct::class);
    }
}
