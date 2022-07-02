<div>
    <div class="flex items-center text-white font-semibold">
        Hello, {{auth()->user()->name}}
    </div>

    <form action="{{route('logout')}}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="text-white font-semibold">
            Logout
        </button>
    </form>
</div>
