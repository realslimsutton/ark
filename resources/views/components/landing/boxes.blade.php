<div class="grid md:grid-cols-3 gap-6 mt-6">
    <x-landing.boxes.status :status="config('ark.server.status')"/>

    <x-landing.boxes.discord />

    <x-landing.boxes.facebook />
</div>
