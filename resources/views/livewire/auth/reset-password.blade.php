<div class="min-h-screen w-full bg-primary-dark flex items-center justify-center">
    <div class="max-w-md w-full px-4 py-12">
        <form action="{{ route('password.update') }}" method="POST" class="space-y-12 md:space-y-24">
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

                {{$this->form}}

                <x-filament::button type="submit" class="w-full">
                    Reset password
                </x-filament::button>

                <div class="hidden">
                    @csrf
                </div>
            </x-filament::card>
        </form>
    </div>
</div>
