<?php

namespace App\Http\Livewire\Auth;

use Filament\Facades\Filament;
use Livewire\Component;

class VerifyEmail extends Component
{
    public function mount()
    {
        if (!auth()->check() || auth()->user()->hasVerifiedEmail()) {
            redirect()->route('landing');
        }

        if (session('status')) {
            Filament::notify('success', session('status'), true);
        }
    }

    public function render()
    {
        return view('livewire.auth.verify-email')
            ->layout('filament::components.layouts.base', [
                'title' => 'Email Verification'
            ]);
    }
}
