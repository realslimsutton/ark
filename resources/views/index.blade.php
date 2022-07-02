@extends('layouts.landing')

@section('content')
    <x-layout.container>
        <x-landing.slider/>

        <x-landing.boxes/>

        <div>
            <x-landing.section-title>
                LATEST NEWS
            </x-landing.section-title>
        </div>
    </x-layout.container>
@endsection
