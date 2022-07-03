<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show($id)
    {
        $product = Product::query()
            ->with([
                'fields',
                'fields.options'
            ])
            ->findOrFail($id);

        $fieldIds = $this->getFieldIds($product);

        return view('test', [
            'product' => $product,
            'fieldIds' => $fieldIds
        ]);
    }

    private function getFieldIds(Product $product): array
    {
        return $product->fields->mapWithKeys(fn($value, $key) => [
            $value->id => $value->additional_price
        ])->all();
    }
}
