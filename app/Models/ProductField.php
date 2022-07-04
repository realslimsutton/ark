<?php

namespace App\Models;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductField extends Model implements IsActivitySubject
{
    use HasFactory, LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logFillable();
    }

    public function getActivitySubjectDescription(Activity $activity): string
    {
        return $this->name;
    }
}
