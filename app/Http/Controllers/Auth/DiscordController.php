<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DiscordUser;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;

class DiscordController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function authenticate()
    {
        $discord = Socialite::driver('discord')->user();

        $user = User::query()
            ->where('email', '=', $discord->email)
            ->first();

        if ($user === null) {
            $user = $this->createUser($discord);

            event(new Registered($user));
        } else {
            $this->updateUser($user, $discord);
        }

        Auth::login($user);

        return redirect()->route('landing');
    }

    private function createUser(SocialiteUser $discord): User
    {
        $discordUser = DiscordUser::query()
            ->with('user')
            ->where('discord_id', '=', $discord->id)
            ->first();

        if ($discordUser !== null) {
            $discordUser->user->forceFill([
                'email' => $discord->email,
                'email_verified_at' => now()
            ])->save();

            return $discordUser->user;
        }

        $user = User::query()
            ->create([
                'name' => $discord->name,
                'email' => $discord->email,
                'email_verified_at' => now()
            ]);

        $user->discord()->create([
            'discord_id' => $discord->id,
            'discriminator' => $discord->user['discriminator'],
            'avatar' => $discord->avatar
        ]);

        return $user;
    }

    private function updateUser(User $user, SocialiteUser $discord): void
    {
        $user->forceFill([
            'name' => $discord->name
        ])->save();

        $user->discord->forceFill([
            'discord_id' => $discord->id,
            'discriminator' => $discord->user['discriminator'],
            'avatar' => $discord->avatar
        ])->save();
    }
}
