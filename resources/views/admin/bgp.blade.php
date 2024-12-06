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
<div class="flex justify-center gap-6 mt-24">
    <!-- Behind the Lense -->
    <a href="./admin-behind-the-lense" class="relative block px-44 py-80 rounded-xl overflow-hidden group">
        <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-70 transition-opacity duration-300">
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out" style="background-image: url('/asset/AdminBPG/behindthelense.webp');"></div>
        </div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <span class="text-2xl font-bold text-white transition-all duration-300">Behind the Lense</span>
        </div>
    </a>

    <!-- Photography -->
    <a href="./admin-photography" class="relative block px-44 py-80 rounded-xl overflow-hidden group">
        <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-70 transition-opacity duration-300">
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out" style="background-image: url('/asset/AdminBPG/photography.webp');"></div>
        </div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <span class="text-2xl font-bold text-white transition-all duration-300">Photography</span>
        </div>
    </a>

    <!-- Graphic Design -->
    <a href="./admin-graphic-design" class="relative block px-44 py-80 rounded-xl overflow-hidden group">
        <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-70 transition-opacity duration-300">
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out" style="background-image: url('/asset/AdminBPG/graphicdesign.webp');"></div>
        </div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <span class="text-2xl font-bold text-white transition-all duration-300">Graphic Design</span>
        </div>
    </a>
</div>
@endsection
