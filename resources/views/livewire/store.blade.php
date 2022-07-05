<div class="space-y-6">
    <div>
        Showing {{$products->firstItem()}} - {{$products->lastItem()}} of {{$products->total()}} results
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:col-span-2">
            @foreach($products as $product)
                <x-store.product-summary :product="$product"/>
            @endforeach

            <div class="md:col-span-2 lg:col-span-3">
                {{$products->links()}}
            </div>
        </div>

        <div></div>
    </div>
</div>
