<?php

namespace App\Http\Livewire\Auth;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password;

class ResetPassword extends Component implements HasForms
{
    use InteractsWithForms;

    public function mount()
    {
        if (auth()->check()) {
            redirect()->route('landing');
        }

        $this->form->fill();

        if (session('status')) {
            Filament::notify('success', session('status'), true);
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password')
            ->layout('filament::components.layouts.base', [
                'title' => 'Reset Password'
            ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email_label')
                ->label('Email address')
                ->afterStateHydrated(fn($component) => $component->state(request()->input('email')))
                ->disabled()
            ->maxLength(255),
            Password::make('password')
                ->label('Password')
                ->extraInputAttributes(['name' => 'password'])
                ->required()
                ->rules([
                    'confirmed',
                    Rules\Password::defaults()
                ]),
            Password::make('password_confirmation')
                ->label('Confirm password')
                ->extraInputAttributes(['name' => 'password_confirmation'])
                ->required(),
            Hidden::make('email')
                ->extraAttributes(['name' => 'email'])
                ->afterStateHydrated(fn($component) => $component->state(request()->input('email'))),
            Hidden::make('token')
                ->extraAttributes(['name' => 'token'])
                ->afterStateHydrated(fn($component) => $component->state(request()->route('token')))
        ];
    }
}
