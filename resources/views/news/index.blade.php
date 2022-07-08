@extends('layouts.page')

@section('title')
    STORE
@endsection

@section('content')
    <x-layout.container class="space-y-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <x-landing.latest-news.vertical-summary :post="$article"/>
            @endforeach
        </div>

        <div class="flex items-center justify-center">
            {{$articles->links('components.news.pagination')}}
        </div>
    </x-layout.container>
@endsection
