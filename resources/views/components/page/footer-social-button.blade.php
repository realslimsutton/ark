@props(['to'])

<a
    href="{{$to}}"
    class="p-2 bg-white text-primary-dark rounded-full flex items-center justify-center transition duration-150 hover:text-white hover:bg-secondary-light focus:bg-secondary-dark focus:text-white"
>
    {{$slot}}
</a>
