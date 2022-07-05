<div class="space-y-6">
    <div class="grid lg:grid-cols-3 gap-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:col-span-2 order-last lg:order-first">
            <div class="md:col-span-2 lg:col-span-3 flex items-center justify-between flex-wrap">
                <div>
                    <p class="text-white font-medium">
                        Showing {{$products->firstItem()}} - {{$products->lastItem()}} of {{$products->total()}} results
                    </p>
                </div>

                <div>
                    <x-store.sorting/>
                </div>
            </div>
            @foreach($products as $product)
                <x-store.product-summary :product="$product"/>
            @endforeach

            <div class="md:col-span-2 lg:col-span-3 flex items-center justify-center">
                {{$products->links('components.store.pagination')}}
            </div>
        </div>

        <div class="space-y-6 order-first lg:order-last">
            <x-store.filters.search/>

            <x-store.filters.price :min-price="$this->minLimit" :max-price="$this->maxLimit"/>

            <x-store.filters.categories :categories="$categories" :category-id="$this->category"/>
        </div>
    </div>
</div>
