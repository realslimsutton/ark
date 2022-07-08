<?php

namespace App\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Livewire\Component;
use MartinRo\FilamentCharcountField\Components\CharcountedTextInput;
use Phpsa\FilamentPasswordReveal\Password;

class Register extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;

    public function mount(): void
    {
        if (auth()->check()) {
            redirect()->intended(route('landing'));
        }

        $this->form->fill();
    }

    public function register(CreatesNewUsers $creator)
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->addError(
                'email',
                'Too many registration attempts. Please try again ' . $exception->secondsUntilAvailable . ' seconds.'
            );

            return null;
        }

        $data = $this->form->getState();

        event(new Registered($user = $creator->create($data)));

        auth()->login($user);

        return redirect()->route('landing');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('filament::components.layouts.base', [
                'title' => 'Register'
            ]);
    }

    protected function getFormSchema(): array
    {
        return [
            CharcountedTextInput::make('name')
                ->label('Username')
                ->required()
                ->maxLength(255)
                ->maxCharacters(255)
                ->unique('users', 'name'),
            CharcountedTextInput::make('email')
                ->label('Email address')
                ->required()
                ->maxLength(255)
                ->maxCharacters(255)
                ->email()
                ->rules(['confirmed']),
            CharcountedTextInput::make('email_confirmation')
                ->label('Confirm email address')
                ->required()
                ->email()
                ->maxLength(255)
                ->maxCharacters(255),
            Grid::make()
                ->schema([
                    Password::make('password')
                        ->label('Password')
                        ->required()
                        ->rules([
                            'confirmed',
                            Rules\Password::defaults()
                        ]),

                    Password::make('password_confirmation')
                        ->label('Confirm password')
                        ->required()
                ])
                ->columns([
                    'md' => 2
                ])
        ];
    }
}
