@extends('layouts.landing')

@section('content')
    <x-layout.container>
        <div class="h-96 w-full bg-primary-dark/90 rounded"></div>

        <div class="grid md:grid-cols-3 gap-6 mt-6">
            <div class="h-24 w-full bg-primary-default shadow rounded"></div>
            <div class="h-24 w-full bg-primary-default shadow rounded"></div>
            <div class="h-24 w-full bg-primary-default shadow rounded"></div>
        </div>
    </x-layout.container>
@endsection
