<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'options'
    ];

    protected $casts = [
        'options' => 'array'
    ];
}
