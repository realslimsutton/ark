<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::query()
            ->with([
                'fields',
                'fields.options',
                'media' => function ($query) {
                    $query->where('collection_name', '=', 'thumbnail');
                }
            ])
            ->paginate();

        return view('livewire.store', [
            'products' => $products
        ]);
    }
}
