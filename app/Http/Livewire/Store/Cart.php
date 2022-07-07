<?php

namespace App\Http\Livewire\Store;

use App\Models\ProductField;
use App\Models\ProductFieldOption;
use App\Support\Cart as CartHelper;
use DB;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'cartUpdated' => '$refresh'
    ];

    public $cart;

    public $products;

    public $totals;

    public $total;

    public function mount()
    {
        $this->cart = CartHelper::get();

        $initialCount = count($this->cart);

        $this->products = \App\Models\Product::query()
            ->with([
                'fields',
                'fields.options',
                'media' => function ($query) {
                    $query->where('collection_name', '=', 'thumbnail');
                }
            ])
            ->whereIn('id', collect($this->cart)->map((fn($product) => $product['product'])))
            ->whereRaw(DB::raw('(published_at IS NOT NULL AND NOW() >= published_at)'))
            ->whereRaw(DB::raw('(expires_at IS NULL OR NOW() <= expires_at)'))
            ->get()
            ->mapWithKeys(fn($product) => [
                $product->id => $product
            ])
            ->toArray();

        $this->cart = collect($this->cart)
            ->filter(fn($entry) => isset($this->products[$entry['product']]))
            ->all();

        if ($initialCount !== count($this->cart)) {
            CartHelper::replace($this->cart);
        }

        $this->totals = $this->getProductTotals();
        $this->total = collect($this->totals)
            ->sum();
    }

    public function render()
    {
        return view('livewire.store.cart');
    }

    public function updateCart()
    {
        CartHelper::replace($this->cart);

        $this->totals = $this->getProductTotals();
        $this->total = collect($this->totals)
            ->sum();

        $this->emit('cartUpdated');
    }

    public function deleteFromCart($key)
    {
        unset($this->cart[$key]);
        $this->updateCart();
    }

    public function getOption(array $field, $id): ?array
    {
        return collect($field['options'])
            ->first(fn($option) => $option['value'] == $id);
    }

    private function getProductTotals()
    {
        $prices = [];

        foreach ($this->cart as $entry) {
            $product = $this->products[$entry['product']];

            $price = $product['price'];

            foreach ($product['fields'] as $field) {
                if (!isset($entry[$field['id']])) {
                    continue;
                }

                $option = $this->getOption($field, $entry[$field['id']]);
                if ($option === null) {
                    continue;
                }

                $price += $option['additional_price'];
            }

            $prices[$product['id']] = $price * $entry['quantity'];
        }

        return $prices;
    }
}
