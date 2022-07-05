@props(['categories', 'categoryId'])

<x-landing.sidebar.box>
    <x-slot:title>
        CATEGORIES
    </x-slot:title>

    <div>
        <ul class="space-y-2">
            @foreach($categories as $id => $title)
                <li class="flex items-center space-x-2">
                    <a
                        href="{{route('store.index')}}"
                        wire:click.prevent="setCategory(null)"
                        @class([
                            'block text-secondary-light',
                            'hidden' => $id !== $categoryId
                        ])
                    >
                        @svg('heroicon-o-x-circle', 'h-6 w-6')
                    </a>

                    <a
                        href="{{route('store.index', ['category' => $id])}}"
                        wire:click.prevent="setCategory({{$id}})"
                        @class([
                            'block text-xl font-semibold text-white',
                            'text-secondary-light' => $id === $categoryId
                        ])
                    >
                        {{$title}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-landing.sidebar.box>
