<div class="min-h-screen w-full bg-primary-dark flex items-center justify-center">
    <div class="max-w-md w-full p-4">
        <form wire:submit.prevent="authenticate" class="space-y-24">
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
                        Create your account
                    </h1>
                </div>

                {{$this->form}}

                <x-filament::button type="submit" class="w-full">
                    Register
                </x-filament::button>

                <x-auth.discord-button/>
            </x-filament::card>
        </form>
    </div>
</div>
