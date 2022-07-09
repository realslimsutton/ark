<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($this->record->products as $product)
        <x-filament::card>
            <div class="flex flex-col items-center justify-center">
                <a
                    href="{{route('filament.resources.store/products.edit', [$product->id])}}"
                    class="text-lg font-semibold"
                    target="blank"
                >
                    <span class="text-secondary-light">{{$product->category->title}}:</span> {{$product->name}}
                </a>

                <ul class="space-y-1">
                    @forelse($product->fields as $field)
                        <li>
                            <span
                                class="font-medium text-secondary-light">{{$field->name}}:</span> {{$product->pivot->options[$field->id] ?? '-'}}
                        </li>
                    @empty
                        <li>
                            <span class="font-medium">
                                -
                            </span>
                        </li>
                    @endforelse
                </ul>
            </div>
        </x-filament::card>
    @endforeach
</div>
