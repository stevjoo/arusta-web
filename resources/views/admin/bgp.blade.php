@extends('layouts.app')

@section('title', 'Admin BGP')

@section('header')
<header class="bg-darkgray shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Photo') }}
        </h1>
    </div>
</header>
@endsection

@section('content')
<div class="flex justify-center gap-5 mt-24">
    <a class="bg-darkgray px-32 py-56 rounded-xl hover:bg-darkgray/75 transition duration-200" href="./admin-behind-the-lense">Behind the Lense</a>
    <a class="bg-darkgray px-32 py-56 rounded-xl hover:bg-darkgray/75 transition duration-200" href="./admin-photography">Photography</a>
    <a class="bg-darkgray px-32 py-56 rounded-xl hover:bg-darkgray/75 transition duration-200" href="./admin-graphic-design">Graphic Design</a>
</div>

@endsection