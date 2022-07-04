<?php

namespace App\Models;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductCategory extends Model implements IsActivitySubject
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logFillable();
    }

    public function getActivitySubjectDescription(Activity $activity): string
    {
        return $this->title;
    }
}
