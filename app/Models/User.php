<?php

namespace App\Models;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use function Illuminate\Events\queueable;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail, IsActivitySubject
{
    use HasFactory, Notifiable, HasRoles, LogsActivity, CausesActivity, Billable;

    protected $with = [
        'discord'
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'balance'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected static function booted()
    {
        static::updated(queueable(function($user) {
            if ($user->hasStripeId()) {
                $user->syncStripeCustomerDetails();
            }
        }));
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function discord(): HasOne
    {
        return $this->hasOne(DiscordUser::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function canAccessFilament(): bool
    {
        return $this->hasPermissionTo('view admin');
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
}
