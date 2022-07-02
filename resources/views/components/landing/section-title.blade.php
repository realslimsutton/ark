@props(['title' => null])

<div>
    <h2 class="section-title text-2xl text-white font-bold uppercase flex my-6">
        <span>
            {{$title ?? $slot}}
        </span>
    </h2>
</div>
