<div>
    <a
        href="{{route('store.cart.show')}}"
        @class([
            'text-white font-bold text-sm uppercase border-b-[3px] border-transparent py-7 transition duration-150 hover:text-secondary-dark hover:border-secondary-dark focus:text-secondary-light focus:border-secondary-light',
            'text-secondary-light border-secondary-light' => false
        ])
    >
        <div class="relative">
            <span>
                @svg('heroicon-o-shopping-bag', 'h-6 w-6')
            </span>
            <sup class="absolute -top-1 -right-1 bg-red-500 text-xs px-1 rounded-full text-white">
                {{$cartCount}}
            </sup>
        </div>
    </a>
</div>
