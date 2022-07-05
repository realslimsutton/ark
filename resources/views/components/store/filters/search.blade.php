<x-landing.sidebar.box>
    <x-slot:title>
        Search
    </x-slot:title>

    <input
        type="search"
        wire:model.debounce.500ms="search"
        class="w-full bg-primary-dark rounded border border-primary-accent text-white transition duration-150 hover:border-secondary-light focus:ring-0 focus:border-secondary-dark"
    />
</x-landing.sidebar.box>
