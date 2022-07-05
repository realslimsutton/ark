<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTags, LogsActivity;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'category_id',
        'published_at',
        'expires_at'
    ];

    protected $casts = [
        'price' => 'integer',
        'published_at' => 'datetime',
        'expires_at' => 'datetime'
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(ProductField::class)
            ->using(ProductProductField::class)
            ->withPivot('config');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
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
