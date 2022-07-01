@props(['center' => true])

<div
    {{$attributes->class([
        'max-w-6xl w-full px-6',
        'mx-auto' => $center
    ])}}
>
    {{$slot}}
</div>
