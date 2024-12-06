@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
<div class="container mx-auto py-10 text-center">
    <h1 class="text-2xl md:text-5xl tracking-[.34em] text-white font-bold mb-10">Our Portfolio</h1>

    <div class="grid px-5 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <!-- Photography -->
        <a href="./photography" class="relative block rounded-lg p-2 py-96 hover:shadow-xl transition-all duration-300 ease-in-out group">
            <h2 class="text-5xl text-white font-bold mb-4 relative z-20">Photography</h2>
            <!-- Image with dark overlay on hover -->
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out group-hover:opacity-100 opacity-50" style="background-image: url('/asset/Photography/banner.webp');">
            </div>
        </a>

        <!-- Graphic Design -->
        <a href="./graphic-design" class="relative block rounded-lg p-6 py-96 hover:shadow-xl transition-all duration-300 ease-in-out group">
            <h2 class="text-5xl texwhite font-bold mb-4 relative z-20">Graphic Design</h2>
            <!-- Image with dark overlay on hover -->
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out group-hover:opacity-100 opacity-50" style="background-image: url('/asset/GraphicDesign/banner.webp');">
            </div>
        </a>
    </div>
</div>
@endsection
