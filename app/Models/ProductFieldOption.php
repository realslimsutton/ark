<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductFieldOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'additional_price'
    ];

    protected $casts = [
        'additional_price' => 'integer'
    ];

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(ProductField::class, 'product_field_field_option');
    }

    public function isColor(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (str_starts_with($this->value, '#')) {
                    return true;
                }

                $lower = mb_strtolower($this->value);

                return str_starts_with($lower, 'rgb');
            }
        );
    }
}
