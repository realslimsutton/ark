@props(['latestNews'])

<div>
    <x-landing.section-title>
        <span class="text-secondary-light">LATEST</span> NEWS
    </x-landing.section-title>

    <div
        class="w-full grid md:grid-cols-2 gap-6 md:gap-0"
        x-data="{activePostIndex: 0, posts: @js($latestNews)}"
    >
        <div class="border-r border-primary-accent overflow-x-hidden">
            <ul class="divide-y divide-primary-accent">
                @foreach($latestNews->take(4) as $post)
                    <x-landing.latest-news.horizontal-summary :post="$post" :loop="$loop"/>
                @endforeach
            </ul>
        </div>

        <x-landing.latest-news.detailed-summary/>
    </div>

    @if($latestNews->count() > 4)
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 my-6">
            @foreach($latestNews->skip(4) as $post)
                <x-landing.latest-news.vertical-summary :post="$post"/>
            @endforeach
        </div>
    @endif
</div>
