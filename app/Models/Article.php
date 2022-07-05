<?php

namespace App\Models;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Article extends Model implements HasMedia, IsActivitySubject
{
    use HasFactory, HasTags, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'user_id',
        'category_id',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function getActivitySubjectDescription(Activity $activity): string
    {
        return $this->title;
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
