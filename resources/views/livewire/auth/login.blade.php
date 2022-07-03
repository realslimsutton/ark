<div class="min-h-screen w-full bg-primary-dark flex items-center justify-center">
    <div class="max-w-md w-full">
        <form wire:submit.prevent="authenticate" class="space-y-8">
            <div class="flex items-center justify-center">
                <a
                    href="{{route('landing')}}"
                    class="text-white font-semibold text-4xl inline-flex items-center justify-center transition duration-150 hover:text-secondary-light focus:text-secondary-dark"
                >
                    SurviveOurArk
                </a>
            </div>

            <x-filament::card>
                {{$this->form}}

                <x-filament::button type="submit" class="w-full">
                    Login
                </x-filament::button>
            </x-filament::card>
        </form>
    </div>
</div>
