@extends('layouts.app')

@section('title', 'Price')

@section('content')
<div class="container mx-auto py-10 text-center">
    <h1 class="text-2xl md:text-5xl tracking-[.34em] text-white font-bold mb-10">Price List</h1>
    
    <div class="grid px-5 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Basic Plan -->
        <a href="./event" class="relative block bg-gradient-to-b from-darkgray to-black rounded-lg p-6 py-64 hover:shadow-xl transition-all duration-300 ease-in-out group">
            <h2 class="text-5xl text-green-600 font-bold mb-4 relative z-20">Basic</h2>
            <p class="text-4xl font-bold mb-4 relative z-20">Rp.500000</p>
            <!-- Image with dark overlay on hover -->
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out group-hover:opacity-100 opacity-75" style="background-image: url('/asset/EventButton/1.webp');">
                <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black"></div> <!-- Dark overlay -->
            </div>
            <ul class="mt-4 z-20 relative text-white">
                <li>Point 1</li>
                <li>Point 2</li>
                <li>Point 3</li>
                <li>Point 4</li>
            </ul>
        </a>

        <!-- Plus Plan -->
        <a href="./event" class="relative block bg-gradient-to-b from-darkgray to-black rounded-lg p-6 py-64 hover:shadow-xl transition-all duration-300 ease-in-out group">
            <h2 class="text-5xl text-red-600 font-bold mb-4 relative z-20">Plus</h2>
            <p class="text-4xl font-bold mb-4 relative z-20">Rp.750000</p>
            <!-- Image with dark overlay on hover -->
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out group-hover:opacity-100 opacity-75" style="background-image: url('/asset/EventButton/2.webp');">
                <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black"></div> <!-- Dark overlay -->
            </div>
            <ul class="mt-4 z-20 relative text-white">
                <li>Point 1</li>
                <li>Point 2</li>
                <li>Point 3</li>
                <li>Point 4</li>
            </ul>
        </a>

        <!-- Premium Plan -->
        <a href="./event" class="relative block bg-gradient-to-b from-darkgray to-black rounded-lg p-6 py-64 hover:shadow-xl transition-all duration-300 ease-in-out group">
            <h2 class="text-5xl text-yellow-400 font-bold mb-4 relative z-20">Premium</h2>
            <p class="text-4xl font-bold mb-4 relative z-20">Rp.1000000</p>
            <!-- Image with dark overlay on hover -->
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-500 ease-in-out group-hover:opacity-100 opacity-75" style="background-image: url('/asset/EventButton/3.webp');">
                <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black"></div> <!-- Dark overlay -->
            </div>
            <ul class="mt-4 z-20 relative text-white">
                <li>Point 1</li>
                <li>Point 2</li>
                <li>Point 3</li>
                <li>Point 4</li>
            </ul>
        </a>
    </div>
</div>
@endsection
