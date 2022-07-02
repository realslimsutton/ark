@props(['post'])

<div>
    <div>
        <div>
            <img src="{{$post['large_thumbnail']}}" class="h-auto w-full rounded-t"/>
        </div>

        <div class="space-y-2 p-4">
            <h3 class="text-white font-semibold uppercase">
                {{$post['title']}}
            </h3>

            <p class="text-neutral-400 mb-4">
                {{$post['summary']}}
            </p>
        </div>
    </div>

    <div class="flex items-center justify-between flex-wrap p-4">
        <a href="#"
           class="bg-primary-default p-2 rounded text-white font-semibold uppercase text-sm transition duration-150 hover:bg-secondary-light focus:bg-secondary-dark">
            READ MORE
        </a>

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
