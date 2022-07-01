@extends('layouts.landing')

@section('content')
    <x-layout.container>
        <div class="h-96 w-full bg-primary-dark/90 rounded glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <img src="{{asset('images/Slider3.jpg')}}" class="h-96 w-full object-cover rounded"/>
                    </li>
                    <li class="glide__slide">
                        <img src="{{asset('images/Slider1.jpg')}}" class="h-96 w-full object-cover rounded"/>
                    </li>
                    <li class="glide__slide">
                        <img src="{{asset('images/Slider2.png')}}" class="h-96 w-full object-cover rounded"/>
                    </li>
                </ul>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
                <button class="glide__bullet" data-glide-dir="=2"></button>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mt-6">
            <div class="h-24 w-full bg-primary-default shadow rounded"></div>
            <div class="h-24 w-full bg-primary-default shadow rounded"></div>
            <div class="h-24 w-full bg-primary-default shadow rounded"></div>
        </div>
    </x-layout.container>
@endsection
