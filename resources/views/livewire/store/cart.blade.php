<div x-data>
    @if($errors->has('cart'))
        <div class="bg-secondary-dark text-white p-2 font-medium mb-8 rounded">
            {{$errors->first('cart')}}
        </div>
    @endif

    <div class="flex items-center justify-between flex-wrap mb-8">
        <div>
            <h2 class="text-3xl font-bold text-white">
                Total: {{$this->total}} <sup>BB</sup>
            </h2>
        </div>

        <div>
            @if(!empty($this->cart))
                <form
                    action="{{route('store.cart.checkout')}}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        class="rounded py-2 px-4 bg-secondary-light font-semibold text-white transition duration-150 hover:bg-secondary-dark focus:bg-secondary-light"
                    >
                        Checkout
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="divide-y divide-primary-accent">
        @forelse($this->cart as $key => $entry)
            @php
                $product = $this->products[$entry['product']];
            @endphp

            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="col-span-1">
                    <div class="w-full bg-primary-accent p-12 rounded">
                        @if($product['thumbnail'] !== null)
                            <img src="{{$product['thumbnail']}}" alt="{{$product['name']}}" class="h-auto w-full"/>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-2 flex items-center">
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <a
                                href="{{route('store.show', [$product['slug']])}}"
                                class="block text-4xl text-white font-bold"
                            >
                                {{$product['name']}}
                            </a>

                            <h3
                                class="text-2xl text-white font-semibold"
                            >
                                <span>
                                    {{$this->totals[$product['id']]}}
                                </span>
                                <sup>
                                    BB
                                </sup>
                            </h3>
                        </div>

                        @if($product['description'] !== null)
                            <p class="text-white">
                                {{$product['description']}}
                            </p>
                        @endif

                        <ul>
                            @foreach($product['fields'] as $field)
                                @php
                                    $option = $this->getOption($field, $entry['options'][$field['id']]);
                                @endphp

                                <li>
                                    <p class="text-neutral-400">
                                        @if($option === null)
                                            {{$field['name']}}: Unknown
                                        @else
                                            {{$field['name']}}: {{$option['name']}}
                                        @endif
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="w-full flex items-center justify-center">
                        <div class="flex items-center">
                            <div>
                                <input
                                    type="number"
                                    class="bg-primary-dark border border-primary-accent rounded text-white font-semibold transition duration-150 focus:ring-0 focus:border-secondary-light"
                                    min="1"
                                    wire:model.defer="cart.{{$key}}.quantity"
                                    wire:change="updateCart"
                                />
                            </div>

                            <div class="flex items-center justify-center text-white space-x-2">
                                <button
                                    type="button"
                                    onclick="confirm('Are you sure you want to delete this product from your cart?') || event.stopImmediatePropagation()"
                                    wire:click.prevent="deleteFromCart({{$key}})"
                                >
                                    @svg('heroicon-o-x', 'h-12 w-12')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2 class="text-white font-semibold text-2xl text-center">
                Cart is empty
            </h2>
        @endforelse
    </div>
</div>
