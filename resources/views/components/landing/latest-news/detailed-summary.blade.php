<div class="h-full w-full relative bg-primary-default rounded-r">
    <div class="md:absolute md:inset-0 overflow-y-auto">
        <div>
            <div
                class="h-[270px] w-full bg-center bg-no-repeat bg-cover object-cover rounded-tr"
                x-bind:style="`background-image: url('${posts[activePostIndex]['large_thumbnail']}')`"
            ></div>
        </div>

        <div class="p-4">
            <h3 class="text-white font-semibold uppercase" x-html="posts[activePostIndex]['title']"></h3>

            <p class="text-neutral-400 mb-4" x-html="posts[activePostIndex]['summary']"></p>

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

</div>
