@props(['products'])

<div>
    <x-landing.section-title>
        <span class="text-secondary-light">BEST</span> SELLING
    </x-landing.section-title>

    <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <x-store.product-summary :product="$product"/>
        @endforeach
    </div>
</div>
