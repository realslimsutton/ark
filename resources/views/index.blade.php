@extends('layouts.landing')

@section('content')
    <x-layout.container>
        <x-landing.slider/>

        <x-landing.boxes/>

        <x-landing.latest-news :latest-news="$latestNews"/>
    </x-layout.container>
@endsection
