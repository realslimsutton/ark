<div
    class="grid md:grid-cols-2 gap-6"
    x-data="{
        price: {{$product->price}},
        selectedOptions: @js($fieldIds)
    }"
    x-init="sum({{$product->price}}, selectedOptions)"
>
    <div>
        <div class="w-full bg-primary-accent p-12 rounded">
            @if($product->thumbnail !== null)
                <img src="{{$product->thumbnail}}" alt="{{$product->name}}" class="h-auto w-full"/>
            @endif
        </div>
    </div>

    <div>
        <form wire:submit.prevent="addToCart" class="space-y-4">
            <h1 class="text-4xl text-white font-bold">
                {{$product->name}}
            </h1>

            <h2
                class="text-2xl text-white font-semibold"
            >
            <span x-html="sum({{$product->price}}, selectedOptions)">
                {{$product->price}}
            </span>
                <sup>
                    BB
                </sup>
            </h2>

            @if($product->description !== null)
                <p class="text-white">
                    {{$product->description}}
                </p>
            @endif

            <div class="divide-y divide-primary-accent">
                @foreach($product->fields as $field)
                    @if($field->in_table)
                        @continue
                    @endif

                    @php
                        $options = $field->options->filter(fn($option) => in_array($option->id, $field->pivot->config));
                    @endphp

                    @if($options->isEmpty())
                        @continue
                    @endif

                    <x-store.horizontal-product-field :field="$field" :options="$options"/>
                @endforeach

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 py-4">
                    @foreach($product->fields as $field)
                        @if(!$field->in_table)
                            @continue
                        @endif

                        @php
                            $options = $field->options->filter(fn($option) => in_array($option->id, $field->pivot->config));
                        @endphp

                        @if($options->isEmpty())
                            @continue
                        @endif

                        <x-store.vertical-product-field :field="$field" :options="$options"/>
                    @endforeach
                </div>
            </div>

            <div class="w-full flex items-center justify-between flex-wrap mt-12">
                <div>
                    <input
                        type="number"
                        class="bg-primary-dark border border-primary-accent rounded text-white font-semibold transition duration-150 focus:ring-0 focus:border-secondary-light"
                        min="0"
                        wire:model.defer="numberOfItems"
                    />
                </div>

                <div>
                    <button
                        type="submit"
                        class="flex items-center justify-center w-full p-2 rounded bg-secondary-light text-white font-semibold transition duration-150 hover:bg-secondary-dark focus:bg-secondary-dark"
                    >
                        Add to cart
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
