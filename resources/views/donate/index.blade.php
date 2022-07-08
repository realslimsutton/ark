@extends('layouts.page')

@section('title')
    STORE
@endsection

@section('content')
    <x-layout.container class="space-y-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <x-donate.product-summary :product="$product"/>
            @endforeach
        </div>
    </x-layout.container>
@endsection
