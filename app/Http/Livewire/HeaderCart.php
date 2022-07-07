<?php

namespace App\Http\Livewire;

use App\Support\Cart;
use Livewire\Component;

class HeaderCart extends Component
{
    protected $listeners = [
        'cartUpdated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.header-cart', [
            'cartCount' => Cart::count()
        ]);
    }
}
