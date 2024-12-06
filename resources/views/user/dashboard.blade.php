@extends('layouts.app')

@section('title', 'ArustaID')

@section('content')
    <div class="animate-appear">
        <h1 class="font-bold text-slate-100 text-3xl m-12 p-2 border-b-2 border-gray-600">
            “Creative Production for Your Vision”
        </h1>
        <div class="bg-gradient-to-br from-gray-600 to-darkgray md:mx-auto md:w-1/2 text-slate-100 m-12 p-8 rounded-lg border-2 border-gray-100 shadow-[16px_16px_0px_rgba(0,0,0,0.5),_18px_18px_0px_rgba(255,255,255,0.3)]">
            <h2 class="font-bold text-3xl">About Us</h2>
            <p class="text-xl">
            Arusta Creative Production adalah tim profesional yang berdedikasi untuk memberikan solusi kreatif di bidang videografi, fotografi, dan desain grafis. 
            Kami mengkhususkan diri dalam mendokumentasikan momen berharga, baik untuk keperluan pribadi maupun bisnis, dengan hasil yang berkualitas tinggi dan 
            penuh perhatian pada detail.
            
            <br>
            <br>

            Dengan pengalaman bertahun-tahun, kami memahami pentingnya menciptakan visual yang tidak hanya menarik, tetapi juga dapat menyampaikan cerita Anda dengan kuat. 
            Dari perencanaan hingga eksekusi, kami hadir untuk memastikan setiap proyek yang kami tangani mencerminkan visi Anda secara sempurna.
            </p>
        </div>
    {{--ELI: nanti ganti dengan text dari adminnya--}}
        <div class="w-full relative">
            <h1 class="text-slate-100 text-3xl font-semi-bold w-1/2 ml-12 text-left">
                Our Client
            </h1>

            {{-- FADE EFFECT (Gradient Overlay) --}}
            <div class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-gray-900 to-transparent pointer-events-none z-10"></div>
            <div class="absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-gray-900 to-transparent pointer-events-none z-10"></div>

            {{-- CONTENT --}}
            <x-client-component></x-client-component>
        </div>

    </div>

@endsection