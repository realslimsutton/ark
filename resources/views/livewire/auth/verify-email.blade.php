<div class="min-h-screen w-full bg-primary-dark flex items-center justify-center">
    <div class="max-w-md w-full px-4 py-12">
        <div class="space-y-12 md:space-y-24">
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
                        Email verification
                    </h1>
                </div>

                <p class="text-neutral-400">
                    We need to verify your email address. Please follow the instructions that has been sent to your
                    email address.
                </p>

                <form action="{{route('verification.send')}}" method="POST">
                    <x-filament::button type="submit" class="w-full">
                        Resend email
                    </x-filament::button>

                    <div class="hidden">
                        @csrf
                    </div>
                </form>

                <form action="{{route('logout')}}" method="POST">
                    <x-filament::button type="submit" color="secondary" class="w-full">
                        Logout
                    </x-filament::button>

                    <div class="hidden">
                        @csrf
                    </div>
                </form>
            </x-filament::card>
        </div>
    </div>
</div>
