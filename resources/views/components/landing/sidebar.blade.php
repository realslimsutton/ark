@props(['topDonators'])

<div class="space-y-6">
    <x-landing.sidebar.server-rates/>

    <x-landing.sidebar.top-donators :top-donators="$topDonators"/>
</div>
