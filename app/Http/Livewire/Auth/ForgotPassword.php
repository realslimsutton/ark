<?php

namespace App\Http\Livewire\Auth;

use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class ForgotPassword extends Component implements HasForms
{
    use InteractsWithForms;

    public $email = '';

    public function mount()
    {
        if (auth()->check()) {
            redirect()->route('landing');
        }

        $this->form->fill();

        if (session('status')) {
            Filament::notify('success', session('status'), true);
            redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')
            ->layout('filament::components.layouts.base', [
                'title' => 'Forgot Password'
            ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email address')
                ->required()
                ->email()
                ->extraInputAttributes(['name' => 'email'])
                ->maxLength(255)
        ];
    }
}
