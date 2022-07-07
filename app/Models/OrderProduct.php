<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    public $timestamps = false;

    protected $casts = [
        'options' => 'array'
    ];
}
