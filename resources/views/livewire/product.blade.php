@props(['product', 'fieldIds'])

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

    <div class="space-y-4">
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

        <div class="flex items-center justify-between">
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
</div>
