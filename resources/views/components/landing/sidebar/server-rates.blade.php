<x-landing.sidebar.box>
    <x-slot name="title">
        <span class="text-secondary-light">SERVER</span> RATES
    </x-slot>

    <ul class="text-center text-white font-semibold">
        <li>
            <span class="text-secondary-dark">Experience (ALL):</span> {{config('ark.server.rates.experience')}}
        </li>

        <li>
            <span class="text-secondary-dark">Harvest:</span> {{config('ark.server.rates.harvest')}}
        </li>

        <li>
            <span class="text-secondary-dark">Taming:</span> {{config('ark.server.rates.taming')}}
        </li>

        <li>
            <span class="text-secondary-dark">Maturation:</span> {{config('ark.server.rates.maturation')}}
        </li>

        <li>
            <span class="text-secondary-dark">Incubation:</span> {{config('ark.server.rates.incubation')}}
        </li>

        <li>
            <span class="text-secondary-dark">Imprint:</span> {{config('ark.server.rates.imprint')}}
        </li>
    </ul>
</x-landing.sidebar.box>
