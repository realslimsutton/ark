@props(['to', 'label', 'active'])

<li>
    <a
        href="{{$to}}"
        @class([
            'text-white font-bold text-sm uppercase tracking-tight border-b-[3px] border-transparent py-7 transition duration-150 hover:text-secondary-light hover:border-secondary-light focus:text-secondary-dark focus:border-secondary-dark',
            'text-secondary-light border-secondary-light' => $active
        ])
    >
        {{$label}}
    </a>
</li>
