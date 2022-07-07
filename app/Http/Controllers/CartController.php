<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductField;
use App\Support\Cart;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Session;

class CartController extends Controller
{
    public function show()
    {
        return view('store.cart');
    }

    public function checkout(Request $request)
    {
        $cart = Cart::get();

        if (empty($cart)) {
            return redirect()->route('store.cart.show');
        }

        $products = Product::query()
            ->with([
                'fields',
                'fields.options'
            ])
            ->whereIn('id', collect($cart)->map((fn($product) => $product['product'])))
            ->whereRaw(DB::raw('(published_at IS NOT NULL AND NOW() >= published_at)'))
            ->whereRaw(DB::raw('(expires_at IS NULL OR NOW() <= expires_at)'))
            ->get()
            ->mapWithKeys(fn($product) => [
                $product->id => $product
            ]);

        $total = collect($this->getProductTotals($cart, $products))->sum();

        if ($request->user()->balance < $total) {
            return redirect()->route('store.cart.show')
                ->withErrors([
                    'cart' => 'Insufficient balance to complete transaction'
                ]);
        }

        $order = Order::create();

        foreach ($cart as $entry) {
            for ($i = 0; $i < $entry['quantity']; $i++) {
                $order->products()->attach($entry['product'], ['options' => $entry['options']]);
            }
        }

        $request->user()->decrement('balance', $total);

        Cart::clear();

        Session::flash('cart.checkout');

        return redirect()->route('landing');
    }

    public function success()
    {
        if (!session('cart.checkout', false)) {
            return redirect()->route('store.cart.show');
        }

        return view('store.cart-checkout-success');
    }

    private function getProductTotals(array $cart, Collection $products): array
    {
        $prices = [];

        foreach ($cart as $entry) {
            $product = $products[$entry['product']];

            $price = $product->price;

            foreach ($product->fields as $field) {
                if (!isset($entry[$field->id])) {
                    continue;
                }

                $option = $this->getOption($field, $entry[$field->id]);
                if ($option === null) {
                    continue;
                }

                $price += $option->additional_price;
            }

            $prices[$product->id] = $price * $entry['quantity'];
        }

        return $prices;
    }

    private function getOption(ProductField $field, $id): ?array
    {
        return collect($field->options)
            ->first(fn($option) => $option['value'] == $id);
    }
}
