@props(['mobile' => false])

<div
    x-data="{expanded: false}"
    x-on:click.away="expanded = false"
    @class([
        'hidden lg:block' => !$mobile,
        'p-3 flex items-center justify-center' => $mobile
    ])
>
    <ul class="flex items-center space-x-4">
        <li>
            <div class="relative">
                <div class="flex items-center space-x-4">
                    <livewire:header-cart/>

                    <button
                        type="button"
                        class="flex items-center text-white font-semibold truncate"
                        x-on:click="expanded = !expanded"
                    >
                        {{auth()->user()->name}}
                    </button>
                </div>

                <div
                    @class([
                        'bg-primary-dark',
                        'origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg border border-primary-accent' => !$mobile
                    ])
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="menu-button"
                    tabindex="-1"
                    x-show="expanded"
                    style="display: none;"
                >
                    <div class="py-1" role="none">
                        <div>
                            <a
                                href="{{route('donate.index')}}"
                                @class([
                                    'w-full text-neutral-400 block px-4 py-2 transition duration-150 hover:text-white focus:text-white font-medium',
                                    'text-left hover:bg-secondary-light focus:bg-secondary-dark' => !$mobile,
                                    'text-center' => $mobile
                                ])
                            >
                                Balance: {{number_format(auth()->user()->balance)}}<sup>BB</sup>
                            </a>
                        </div>

                        <form
                            action="{{route('logout')}}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                role="menuitem"
                                tabindex="-1"
                                @class([
                                    'w-full text-neutral-400 block px-4 py-2 transition duration-150 hover:text-white focus:text-white font-medium',
                                    'text-left hover:bg-secondary-light focus:bg-secondary-dark' => !$mobile,
                                    'text-center' => $mobile
                                ])
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
