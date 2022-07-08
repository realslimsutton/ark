@props(['product'])

<div>
    <a href="{{route('donate.checkout', [$product->id])}}">
        <div class="w-full flex items-center justify-center p-4 bg-primary-accent select-none">
            <h2 class="text-6xl text-white font-bold">
                {{number_format($product->amount)}}
            </h2>
        </div>

        <div class="flex items-center justify-between flex-wrap py-2">
            <h2 class="text-white text-xl font-semibold">
                {{$product->name}}
            </h2>

            <h2 class="text-white text-xl font-semibold">
                £{{$product->price}}
            </h2>
        </div>
    </a>
</div>
