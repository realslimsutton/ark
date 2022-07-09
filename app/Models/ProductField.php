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
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductField extends Model implements HasMedia, IsActivitySubject
{
    use HasFactory, InteractsWithMedia, LogsActivity, SoftDeletes;

    protected $fillable = [
        'name',
        'in_table'
    ];

    protected $casts = [
        'in_table' => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnails')
            ->acceptsMimeTypes([
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
                'image/webp'
            ]);
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
            ->logAll()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function getActivitySubjectDescription(Activity $activity): string
    {
        return $this->name;
    }

    public function getThumbnail(int|Product $product, string $conversionName = ''): ?string
    {
        $id = $product instanceof Product ? $product->id : $product;

        $media = $this->getMedia('thumbnails', [
            'product' => $id
        ])->first();

        return $media?->getUrl($conversionName);
    }
}
