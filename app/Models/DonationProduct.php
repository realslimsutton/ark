<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'stripe_id',
        'price',
        'amount',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'price' => 'integer'
    ];

    public $timestamps = false;

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100
        );
    }
}
