@props(['to', 'label', 'active'])

<li>
    <a
        href="{{$to}}"
        @class([
            'flex items-center justify-center p-3 text-white font-bold text-sm uppercase tracking-tight transition duration-150 hover:text-secondary-light focus:text-secondary-dark',
            'text-secondary-light' => $active
        ])
    >
        {{$label}}
    </a>
</li>
