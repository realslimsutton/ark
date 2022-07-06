@extends('layouts.page')

@section('title')
    STORE
@endsection

@section('content')
    <x-layout.container class="space-y-6">
        <livewire:store.product :slug="$slug"/>
    </x-layout.container>
@endsection
