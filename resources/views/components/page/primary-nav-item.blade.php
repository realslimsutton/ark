@props(['to', 'label', 'active'])

<li>
    <a
        href="{{$to}}"
        @class([
            'text-white font-bold text-sm uppercase border-b-[3px] border-transparent py-7 transition duration-150 hover:text-secondary-dark hover:border-secondary-dark focus:text-secondary-light focus:border-secondary-light',
            'text-secondary-light border-secondary-light' => $active
        ])
    >
        {{$label}}
    </a>
</li>
