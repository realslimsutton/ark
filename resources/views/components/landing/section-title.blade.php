@props(['title' => null])

<div>
    <h2 class="section-title text-white font-bold uppercase">
        <span>
            {{$title ?? $slot}}
        </span>
    </h2>
</div>
