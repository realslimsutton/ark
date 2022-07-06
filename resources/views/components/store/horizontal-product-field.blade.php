@props(['field', 'options'])

<div class="flex items-center space-x-2">
    @if($field->thumbnail !== null)
        <div>
            <img src="{{$field->thumbnail}}" alt="{{$field->name}}" />
        </div>
    @endif

    <div>
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
