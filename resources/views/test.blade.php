@extends('layouts.landing')

@section('content')
    <div class="text-white font-medium">
        <x-layout.container>
            <div x-data="{
                price: {{$product->price}},
                selectedOptions: {{json_encode($fieldIds)}}
            }">
                <div>
                    Name: {{$product->name}}
                </div>

                <div>
                    Description: {{$product->description}}
                </div>

                <div>
                    Price: <span x-html="sum({{$product->price}}, selectedOptions)">{{$product->price}}</span>BB
                </div>

                <div>
                    <p>
                        Options:
                    </p>

                    <div>
                        @forelse($product->fields as $field)
                            <label class="flex items-center space-x-2">
                                <span class="block">
                                    {{$field->name}}:
                                </span>

                                <select
                                    name="field-{{$field->id}}"
                                    class="!text-black"
                                    x-on:change="selectedOptions[{{$field->id}}] = getOptionPrice($event)"
                                >
                                    @foreach($field->options as $option)
                                        @if(!in_array($option->id, $field->pivot->config))
                                            @continue
                                        @endif

                                        <option
                                            value="{{$option->value}}"
                                            class="!text-black"
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
                        @empty
                            <p>
                                No options
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </x-layout.container>
    </div>
@endsection
