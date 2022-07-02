@props(['post', 'loop'])

<div
    {{$attributes->class([
        'flex items-center justify-center space-x-3 p-3 bg-primary-default cursor-pointer select-none transition duration-150 hover:bg-primary-accent',
        'rounded-tl' => $loop->first,
        'rounded-bl' => $loop->last
    ])}}
    x-bind:class="activePostIndex === {{$loop->index}} ? '!bg-secondary-dark' : ''"
    x-on:click.prevent="activePostIndex = {{$loop->index}}"
>
    <div>
        <img
            src="{{$post['small_thumbnail']}}"
            class="h-auto w-24 w-full rounded"
        />
    </div>

    <div class="truncate">
        <h3 class="text-white font-semibold uppercase truncate">
            {{$post['title']}}
        </h3>

        <p
            class="text-neutral-400 mb-4 truncate"
            x-bind:class="activePostIndex === {{$loop->index}} ? '!text-white' : ''">
            {{$post['summary']}}
        </p>

        <p class="flex items-center space-x-1 text-xs text-neutral-400 font-medium">
            <span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                </svg>
            </span>

            <span>Sep 18, 2022</span>
        </p>
    </div>
</div>
