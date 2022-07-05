@props(['minPrice', 'maxPrice'])

<x-landing.sidebar.box>
    <x-slot:title>
        FILTER BY PRICE
    </x-slot:title>

    <div class="px-4">
        <div
            x-data
            x-init="
    window.noUiSlider.create($refs.priceSlider, {
        start: [ {{$minPrice}}, {{$maxPrice}} ],
        tooltips: true,
        format: {
            to: function (value) {
                return value.toLocaleString();
            },
            from: function (value) {
                return parseInt(value.replace(/\D/g,''));
            }
        },
        step: 1,
        connect: true,
        range: {
            min: parseInt({{$minPrice}}),
            max: parseInt({{$maxPrice}})
        }
    });

    window.mergeTooltips($refs.priceSlider, 15, ' - ');

    $refs.priceSlider.noUiSlider.on('set', function(values) {
        @this.set('min', values[0]);
        @this.set('max', values[1]);
    });
    "
            wire:ignore
        >
            <div x-ref="priceSlider"></div>
        </div>
    </div>
</x-landing.sidebar.box>
