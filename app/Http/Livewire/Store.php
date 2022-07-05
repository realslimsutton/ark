<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;

    public $category = '';

    public $search = '';

    public $minLimit;

    public $min;

    public $maxLimit;

    public $max;

    public $categories;

    protected $queryString = [
        'category' => ['except' => ''],
        'search' => ['except' => '']
    ];

    public function mount()
    {
        $this->categories = ProductCategory::all()
            ->mapWithKeys(fn(ProductCategory $category) => [
                $category->id => $category->title
            ])
            ->all();

        $prices = Product::query()
            ->selectRaw(" MIN(price) AS min_price, MAX(price) AS max_price")
            ->first();

        $this->minLimit = $prices->min_price ?? 0;
        $this->min = $this->minLimit;

        $this->maxLimit = $prices->max_price ?? 1;
        $this->max = $this->maxLimit;
    }

    public function render()
    {
        $products = Product::query()
            ->with([
                'category',
                'fields',
                'fields.options',
                'media' => function ($query) {
                    $query->where('collection_name', '=', 'thumbnail');
                }
            ])
            ->when(!empty($this->category), function ($query) {
                $query->where('category_id', '=', $this->category);
            })
            ->whereBetween('price', [
                $this->min,
                $this->max
            ])
            ->whereRaw(DB::raw('(published_at IS NULL OR NOW() >= published_at)'))
            ->whereRaw(DB::raw('(expires_at IS NULL OR NOW() <= expires_at)'))
            ->when(!empty($this->search), function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%');
            })
            ->orderByDesc('expires_at')
            ->orderByDesc('published_at')
            ->paginate();

        return view('livewire.store', [
            'products' => $products
        ]);
    }

    public function setCategory(int|null $id = null)
    {
        $this->category = $id ?? '';
    }
}
