<?php

namespace App\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Validation\Rules;
use Livewire\Component;
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

    public function register()
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

        dd($data);
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
            TextInput::make('name')
                ->label('Username')
                ->required()
                ->maxLength(255),
            TextInput::make('email')
                ->label('Email address')
                ->required()
                ->maxLength(255)
                ->email()
                ->rules(['confirmed']),
            TextInput::make('email_confirmation')
                ->label('Confirm email address')
                ->required()
                ->email(),
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