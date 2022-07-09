@props(['product', 'field', 'options'])

@php
    $thumbnail = $field->getThumbnail($product);
@endphp

<div class="grid grid-cols-3 gap-4 py-4">
    @if($thumbnail !== null)
        <div class="col-span-1">
            <img src="{{$thumbnail}}" alt="{{$field->name}}" class="w-full h-auto"/>
        </div>
    @endif

    <div
        @class([
            'flex items-center',
            'col-span-2' => $thumbnail !== null,
            'col-span-3' => $thumbnail === null
        ])
    >
        <label class="text-white font-medium space-x-2">
            <span>
                {{$field->name}}:
            </span>

            <select
                name="field-{{$field->id}}"
                class="bg-primary-dark border border-primary-accent rounded text-white font-semibold transition duration-150 focus:ring-0 focus:border-secondary-light"
                wire:model.defer="selectedOptions.{{$field->id}}"
                x-on:change="selectedOptions[{{$field->id}}] = getOptionPrice($event)"
            >
                @foreach($options as $option)
                    <option
                        value="{{$option->value}}"
                        data-store-price="{{$option->additional_price}}"
                        @if($option->is_color)
                            style="background-color: {{$option->value}}"
                        @endif
                    >
                        @if($option->additional_price > 0)
                            {{$option->name}} (+{{$option->additional_price}}BB)
                        @else
                            {{$option->name}}
                        @endif
                    </option>
                @endforeach
            </select>
        </label>
    </div>
</div>
