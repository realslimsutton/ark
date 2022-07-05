@props(['product'])

<div class="w-full flex flex-col flex-grow">
    <a href="#" class="block">
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
                    <span>{{$product->price}}</span><sup>BB</sup>
                </h3>
            </div>

            @if($product->description !== null)
                <div>
                    <p class="text-neutral-400">
                        {{$product->description}}
                    </p>
                </div>
            @endif

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
