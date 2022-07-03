<?php

namespace App\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Login extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;

    public $email = '';
    public $password = '';
    public $remember = false;

    public function mount(): void
    {
        if (auth()->check()) {
            redirect()->intended(route('landing'));
        }

        $this->form->fill();
    }

    public function authenticate()
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->addError('email', __('filament::login.messages.throttled', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]));

            return null;
        }

        $data = $this->form->getState();

        if (!auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ], $data['remember'])) {
            $this->addError('email', __('filament::login.messages.failed'));

            return null;
        }

        $user = auth()->user();

        $url = $user->hasPermissionTo('view admin')
            ? route('filament.pages.dashboard')
            : route('landing');

        return redirect()->intended($url);
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('filament::components.layouts.base', [
                'title' => 'Login'
            ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email address')
                ->required()
                ->email(),
            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(),
            Checkbox::make('remember')
                ->label('Remember me')
        ];
    }
}
