@props(['product'])

<div class="w-full flex flex-col flex-grow">
    <a href="{{route('store.show', [$product->slug])}}" class="block">
        @if($product->thumbnail !== null)
            <div class="bg-primary-accent/60 p-4 rounded">
                <img src="{{$product->thumbnail}}" alt="{{$product->name}}"/>
            </div>
        @endif

        <div class="py-2">
            <div class="flex items-center justify-between">
                <h3 class="text-lg text-white font-semibold truncate">
                    {{$product->name}}
                </h3>

                <h3 class="text-lg text-white font-semibold">
                    <span>{{number_format($product->price)}}</span><sup>BB</sup>
                </h3>
            </div>

            <div>
                <a
                    href="{{route('store.index', ['category' => $product->category->id])}}"
                    class="text-secondary-light transition duration-150 hover:text-secondary-dark focus:text-secondary-light"
                    wire:click.prevent="setCategory({{$product->category->id}})"
                >
                    {{$product->category->title}}
                </a>
            </div>
        </div>
    </a>
</div>
