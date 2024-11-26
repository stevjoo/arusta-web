@extends('layouts.app')

@section('title', 'Photography')

@section('header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Photography') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
<div class="container">
    <a href="/portfolio">Back</a>
    <div class="row">
        @foreach ($photos as $photo)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ Storage::url($photo->image_path) }}" class="card-img-top" alt="{{ $photo->title }}">
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection