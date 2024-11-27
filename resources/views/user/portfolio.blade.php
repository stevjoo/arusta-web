@extends('layouts.app')

@section('title', 'Portfolio')

@section('header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Portfolio') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
<div class="container">
    <a href="./photography">
        {{ __('Photography') }}
    </a>
    <a href="./graphic-design">
        {{ __('Graphic Design') }}
    </a>
</div>
@endsection