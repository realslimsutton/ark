<?php

namespace App\Models;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductFieldOption extends Model implements IsActivitySubject
{
    use HasFactory, LogsActivity, SoftDeletes;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function getActivitySubjectDescription(Activity $activity): string
    {
        return $this->name;
    }
}
