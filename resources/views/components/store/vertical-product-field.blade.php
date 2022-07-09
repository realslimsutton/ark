@props(['product', 'field', 'options'])

@php
    $thumbnail = $field->getThumbnail($product);
@endphp

<div class="flex flex-col items-center space-y-2 pb-4 border-b border-primary-accent">
    @if($thumbnail !== null)
        <div>
            <img src="{{$thumbnail}}" alt="{{$field->name}}" class="w-full h-auto" />
        </div>
    @endif

    <div class="w-full">
        <label class="w-full text-white font-medium space-y-2 text-center">
            <span class="block">
                {{$field->name}}:
            </span>

            <select
                name="field-{{$field->id}}"
                class="w-full bg-primary-dark border border-primary-accent rounded text-white font-semibold transition duration-150 focus:ring-0 focus:border-secondary-light"
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
