<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductProductField extends Pivot
{
    protected $table = 'product_product_field';

    public $timestamps = false;

    protected $casts = [
        'config' => 'array'
    ];
}
