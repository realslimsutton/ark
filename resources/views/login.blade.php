@extends('layouts.landing')

@section('content')
    <x-layout.container>
        <form action="{{route('login')}}" method="POST" class="space-y-4">
            @csrf

            @error('status')
            <div class="bg-red-800 mb-2">
                <p class="text-red text-white">
                    {{$message}}
                </p>
            </div>
            @enderror

            <div>
                <label>
                    <span class="block text-white">
                        Email address:
                    </span>

                    <input type="text" name="email" autocomplete="off">

                    @error('email')
                    <p class="text-red-600 font-medium mt-2">
                        {{$message}}
                    </p>
                    @enderror
                </label>
            </div>

            <div>
                <label>
                    <span class="block text-white">
                        Password
                    </span>

                    <input type="password" name="password" autocomplete="off">

                    @error('password')
                    <p class="text-red-600 font-medium mt-2">
                        {{$message}}
                    </p>
                    @enderror
                </label>
            </div>

            <div>
                <label class="text-white">
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
            </div>

            <div>
                <button type="submit" class="p-2 rounded bg-white">
                    Login
                </button>
            </div>
        </form>
    </x-layout.container>
@endsection
