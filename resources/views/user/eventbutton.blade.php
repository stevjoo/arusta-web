@extends('layouts.app')

@section('title', 'Event')

@section('content')
<div class="relative w-full h-screen">
    <!-- Carousel container -->
    <div x-data="{ current: 0, images: [
            '/asset/EventButton/1.webp', 
            '/asset/EventButton/2.webp', 
            '/asset/EventButton/3.webp'], 
            autoChange() { setInterval(() => { this.current = (this.current + 1) % this.images.length }, 2000) } }" 
         x-init="autoChange()" 
         class="relative w-full h-full">

        <!-- Carousel images with fade transition -->
        <template x-for="(image, index) in images" :key="index">
            <div x-show="current === index"
                 x-transition:enter="transition-opacity duration-1000 ease-in-out"
                 x-transition:leave="transition-opacity duration-1000 ease-in-out"
                 x-transition:enter-start="opacity-0"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 bg-cover bg-center"
                 :style="'background-image: url(' + image + ');'">

                <!-- Dark overlay on top of the image -->
                <div class="absolute inset-0 bg-black bg-opacity-70"></div>
            </div>
        </template>

        <!-- Content centered -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
            <!-- Heading -->
            <h1 class="text-white text-5xl font-bold mb-4">Reserve an Event with Us</h1>
            
            <!-- Button -->
            <a href="./events" class="inline-block px-6 py-3 bg-darkgray border-2 border-white text-gray-100 font-semibold rounded-md hover:bg-opacity-50 transition duration-300 ease-in-out">
                <span>{{ __('Event Schedule') }}</span>   
            </a>
        </div>
    </div>
</div>
@endsection
