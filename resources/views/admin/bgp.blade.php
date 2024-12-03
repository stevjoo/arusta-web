@extends('layouts.app')

@section('title', 'Admin BGP')

@section('header')
<header class="bg-darkgray shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin BGP') }}
        </h1>
    </div>
</header>
@endsection

@section('content')
<a href="./admin-behind-the-lense">Behind the Lense</a>
<a href="./admin-photography">Photography</a>
<a href="./admin-graphic-design">Graphic Design</a>

@endsection