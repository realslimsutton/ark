<x-landing.sidebar.box>
    <x-slot name="title">
        <span class="text-secondary-light">SERVER</span> RATES
    </x-slot>

    <ul class="text-center text-white font-semibold">
        <li>
            <span class="text-secondary-light">Experience (ALL):</span> {{config('ark.server.rates.experience')}}
        </li>

        <li>
            <span class="text-secondary-light">Harvest:</span> {{config('ark.server.rates.harvest')}}
        </li>

        <li>
            <span class="text-secondary-light">Taming:</span> {{config('ark.server.rates.taming')}}
        </li>

        <li>
            <span class="text-secondary-light">Maturation:</span> {{config('ark.server.rates.maturation')}}
        </li>

        <li>
            <span class="text-secondary-light">Incubation:</span> {{config('ark.server.rates.incubation')}}
        </li>

        <li>
            <span class="text-secondary-light">Imprint:</span> {{config('ark.server.rates.imprint')}}
        </li>
    </ul>
</x-landing.sidebar.box>
