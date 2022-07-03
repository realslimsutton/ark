<div>
    <div class="flex items-center text-white font-semibold">
        Hello, {{auth()->user()->name}}
    </div>

    <form action="{{route('filament.auth.logout')}}" method="POST">
        @csrf

        <button type="submit" class="text-white font-semibold">
            Logout
        </button>
    </form>
</div>
