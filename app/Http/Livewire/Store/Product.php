<?php

namespace App\Http\Livewire\Store;

use App\Models\Product as ProductModel;
use App\Support\Cart;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;
use Livewire\Component;
use Livewire\ComponentConcerns\ValidatesInput;

class Product extends Component
{
    use ValidatesInput;

    public ProductModel $product;

    public array $fieldIds = [];

    public $numberOfItems = 1;

    public $selectedOptions = [];

    public function mount($slug)
    {
        $this->product = ProductModel::query()
            ->with([
                'category',
                'fields',
                'fields.options',
                'media' => function ($query) {
                    $query->where('collection_name', '=', 'thumbnail');
                }
            ])
            ->where('slug', '=', $slug)
            ->whereRaw(DB::raw('(published_at IS NOT NULL AND NOW() >= published_at)'))
            ->whereRaw(DB::raw('(expires_at IS NULL OR NOW() <= expires_at)'))
            ->firstOrFail();

        $this->fieldIds = $this->getFieldIds($this->product);

        foreach ($this->product->fields as $field) {
            $this->selectedOptions[$field->id] = $field->options
                ->filter(fn($option) => in_array($option->id, $field->pivot->config))
                ->first()
                ?->value;
        }
    }

    public function addToCart()
    {
        $this->validate($this->rules());

        Cart::add([
            'product' => $this->product->id,
            'quantity' => $this->numberOfItems,
            'options' => $this->selectedOptions
        ]);

        $this->emit('cartUpdated');

        $this->emit('openModal', 'modals.cart-confirmation-modal');
    }

    public function render()
    {
        return view('livewire.store.product');
    }

    private function getFieldIds(ProductModel $product): array
    {
        return $product->fields->mapWithKeys(fn($value, $key) => [
            $value->id => $value->options
                ->filter(fn($option) => in_array($option->id, $value->pivot->config))
                ->first()
                ?->additional_price
        ])->all();
    }

    private function rules()
    {
        $rules = [
            'numberOfItems' => [
                'required',
                'integer',
                'min:1'
            ]
        ];

        foreach ($this->product->fields as $field) {
            $rules['selectedOptions.' . $field->id] = [
                'required',
                'string',
                Rule::in($field->options->map(fn($option) => $option->value))
            ];
        }

        return $rules;
    }
}
