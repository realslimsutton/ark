@extends('layouts.landing')

@section('content')
    <x-layout.container>
        <x-landing.slider/>

        <x-landing.boxes/>

        <x-landing.latest-news :latest-news="$latestNews"/>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="col-span-2">
                <x-landing.best-selling/>
            </div>

            <x-landing.sidebar/>
        </div>
    </x-layout.container>
@endsection
