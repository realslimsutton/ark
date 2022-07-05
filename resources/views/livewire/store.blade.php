<div class="space-y-6">
    <div>
        <p class="text-white font-medium">
            Showing {{$products->firstItem()}} - {{$products->lastItem()}} of {{$products->total()}} results
        </p>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:col-span-2 order-last lg:order-first">
            @foreach($products as $product)
                <x-store.product-summary :product="$product"/>
            @endforeach

            <div class="md:col-span-2 lg:col-span-3 flex items-center justify-center">
                {{$products->links('components.store.pagination')}}
            </div>
        </div>

        <div class="space-y-6 order-first lg:order-last">
            <x-landing.sidebar.box>
                <x-slot:title>
                    Search
                </x-slot:title>

                <input
                    type="search"
                    wire:model.debounce.500ms="search"
                    class="w-full bg-primary-dark rounded border border-primary-accent text-white transition duration-150 hover:border-secondary-light focus:ring-0 focus:border-secondary-dark"
                />
            </x-landing.sidebar.box>

            <x-store.filters.price :min-price="$this->minLimit" :max-price="$this->maxLimit"/>
        </div>
    </div>
</div>
