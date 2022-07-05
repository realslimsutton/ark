<?php

namespace App\Models;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductField extends Model implements HasMedia, IsActivitySubject
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'name'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->acceptsMimeTypes([
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
                'image/webp'
            ])
            ->singleFile();
    }

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
            ->dontSubmitEmptyLogs();
    }

    public function getActivitySubjectDescription(Activity $activity): string
    {
        return $this->name;
    }

    public function thumbnail(): Attribute
    {
        return Attribute::make(
            get: function () {
                $thumbnail = $this->getFirstMediaUrl('thumbnail');

                if (empty($thumbnail)) {
                    return null;
                }

                return $thumbnail;
            }
        );
    }
}
