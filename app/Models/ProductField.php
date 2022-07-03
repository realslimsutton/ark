<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->using(ProductProductField::class)
            ->withPivot('config');
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(ProductFieldOption::class, 'product_field_field_option');
    }
}
