@props(['image', 'align' => 'right'])

<li class="glide__slide">
    <div
        @class([
            'h-96 w-full bg-center bg-cover bg-no-repeat rounded flex',
            'justify-start' => $align === 'left',
            'justify-end' => $align === 'right',
            'justify-center' => $align === 'center'
        ])
        style="background-image: url('{{$image}}')"
    >
        @if(!empty($content))
            <div
                class="relative w-full max-w-sm m-8 bg-primary-dark/70 p-8 rounded text-white text-lg flex flex-col justify-center overflow-y-auto z-10"
            >
                <h2 class="text-2xl text-white font-semibold uppercase">
                    {{$title ?? ''}}
                </h2>

                <p>
                    {{$content ?? ''}}
                </p>

                <div>
                    {{$actions ?? ''}}
                </div>
            </div>
        @endif
    </div>
</li>
