@extends('layouts.app')

@section('title', 'ArustaID')

@section('content')
    <div class="animate-appear">
        <!-- Heading Section -->
        <h1 class="font-bold text-slate-100 text-3xl md:text-4xl m-8 md:m-12 p-4 md:p-6 border-b-2 border-gray-600 text-center md:text-left">
            “Creative Production for Your Vision”
        </h1>

        <!-- About Us Section -->
        <div class="bg-gradient-to-br from-gray-600 to-darkgray mx-4 md:mx-8 lg:mx-12 text-slate-100 m-8 md:m-12 p-8 rounded-lg border-2 border-gray-100 shadow-xl">
            <h1 class="font-bold text-2xl md:text-3xl mb-4 text-left">About Us</h1>
            <p class="text-lg md:text-xl leading-relaxed md:leading-[56px]">
                Arusta Creative Production adalah tim profesional yang berdedikasi untuk memberikan solusi kreatif di bidang videografi, fotografi, dan desain grafis. Kami mengkhususkan diri dalam mendokumentasikan momen berharga, baik untuk keperluan pribadi maupun bisnis, dengan hasil yang berkualitas tinggi dan penuh perhatian pada detail. Dengan pengalaman bertahun-tahun, kami memahami pentingnya menciptakan visual yang tidak hanya menarik, tetapi juga dapat menyampaikan cerita Anda dengan kuat. Dari perencanaan hingga eksekusi, kami hadir untuk memastikan setiap proyek yang kami tangani mencerminkan visi Anda secara sempurna.
            </p>
        </div>

        <!-- Our Client Section -->
        <div class="w-full relative mt-12">
            <h1 class="text-slate-100 text-3xl font-semibold text-center md:text-left md:w-1/2 mx-auto md:ml-12">
                Our Clients
            </h1>

            <!-- FADE EFFECT (Gradient Overlay) -->
            <div class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-gray-900 to-transparent pointer-events-none z-10"></div>
            <div class="absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-gray-900 to-transparent pointer-events-none z-10"></div>

            <!-- Client Component -->
            <x-client-component></x-client-component>
        </div>
    </div>
@endsection
