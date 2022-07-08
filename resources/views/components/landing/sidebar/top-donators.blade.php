@props(['topDonators'])

<x-landing.sidebar.box>
    <x-slot name="title">
        <span class="text-secondary-light">TOP</span> DONATORS
    </x-slot>

    <div>
        <ul class="list-decimal text-center text-white font-semibold list-inside text-secondary-light">
            @foreach($topDonators as $user)
                <li>
                    <span class="text-white ml-1">
                        {{$user->name}}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</x-landing.sidebar.box>
