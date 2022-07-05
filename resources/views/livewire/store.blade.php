<div class="space-y-6">
    <div>
        Showing {{$products->firstItem()}} - {{$products->lastItem()}} of {{$products->total()}} results
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:col-span-2">
            @foreach($products as $product)
                <x-store.product-summary :product="$product"/>
            @endforeach

            <div class="md:col-span-2 lg:col-span-3 flex items-center justify-center">
                {{$products->links()}}
            </div>
        </div>

        <div class="space-y-6">
            <div>
                <label>
                    <span class="block text-white">
                        Search
                    </span>

                    <input type="search" wire:model.debounce.500ms="search"/>
                </label>
            </div>

            <x-store.filters.price :min-price="$this->minLimit" :max-price="$this->maxLimit"/>
        </div>
    </div>
</div>
