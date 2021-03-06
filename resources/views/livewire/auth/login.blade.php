<div class="min-h-screen w-full bg-primary-dark flex items-center justify-center">
    <div class="max-w-md w-full px-4 py-12">
        <form wire:submit.prevent="authenticate" class="space-y-12 md:space-y-24">
            <div class="flex items-center justify-center">
                <a
                    href="{{route('landing')}}"
                    class="text-white font-semibold text-4xl inline-flex items-center justify-center transition duration-150 hover:text-secondary-light focus:text-secondary-dark"
                >
                    SurviveOurArk
                </a>
            </div>

            <x-filament::card>
                <div class="flex items-center justify-center mb-8">
                    <h1 class="text-xl text-white font-bold">
                        Login to your account
                    </h1>
                </div>

                <div class="flex items-center justify-center mb-6">
                    <p class="text-neutral-400 font-medium">
                        Don't have an account? <a href="{{route('register')}}"
                                                  class="text-secondary-light transition duration-150 hover:text-secondary-dark focus:text-secondary-light">Register
                            here</a>
                    </p>
                </div>

                {{$this->form}}

                <x-filament::button type="submit" class="w-full">
                    Login
                </x-filament::button>

                <x-auth.discord-button/>
            </x-filament::card>
        </form>
    </div>
</div>
