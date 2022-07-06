<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CartConfirmationModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.cart-confirmation-modal');
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
