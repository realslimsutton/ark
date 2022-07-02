@props(['status'])

<x-page.box class="h-full">
    <div>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
            @class([
                'h-12 w-12',
                'text-green-600' => $status === 'online',
                'text-amber-600' => $status === 'maintenance',
                'text-red-600' => $status === 'offline'
            ])
        >
            @if($status === 'online')
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            @elseif($status === 'maintenance')
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            @else
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            @endif
        </svg>
    </div>

    <div class="ml-2">
        <h3 class="text-lg font-semibold text-neutral-300">
            Status
        </h3>

        <p class="text-neutral-400 text-sm font-semibold">
            Filter by name "SurviveOurArk" and session "UNOFFICIAL PC SESSIONS"
        </p>
    </div>
</x-page.box>
