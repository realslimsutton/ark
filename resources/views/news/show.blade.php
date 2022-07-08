@extends('layouts.page')

@section('title')
    STORE
@endsection

@section('content')
    <x-layout.container class="space-y-6">
        @if($article->large_thumbnail !== null)
            <div>
                <img src="{{$article->large_thumbnail}}" alt="{{$article->title}}"/>
            </div>
        @endif

        <div class="text-white space-y-4">
            {!! $article->content !!}
        </div>
    </x-layout.container>
@endsection
