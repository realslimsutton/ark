<?php

namespace App\Support;

use Filament\AvatarProviders\Contracts\AvatarProvider as AvatarProviderAlias;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UiAvatarProvider implements AvatarProviderAlias
{
    public function get(Model $user): string
    {
        if ($user->discord?->avatar !== null) {
            return $user->discord->avatar;
        }

        $name = Str::of(Filament::getUserName($user))
            ->trim()
            ->explode(' ')
            ->map(fn(string $segment): string => filled($segment) ? mb_substr($segment, 0, 1) : '')
            ->join(' ');

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=FFFFFF&background=292E38';
    }
}
