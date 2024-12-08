@extends('layouts.app')

@section('title', 'ArustaID')

@section('content')
<div class="animate-appear bg-black">
       <!-- Hero Section -->
<!-- Hero Section -->
<div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ url('asset/Dashboard/photo-1471341971476-ae15ff5dd4ea.jpg') }}');">
    <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-70"></div>
    
    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black to-transparent"></div>
    
    <div class="motion-preset-focus relative z-10 text-white p-8 md:p-16 lg:p-24 h-full flex flex-col justify-center">
        <h1 class="motion-preset-shrink text-4xl md:text-5xl lg:text-6xl font-bold ">
            Creative Production
            
        </h1>
        <h1 class="motion-preset-shrink motion-delay-300 text-2xl md:text-3xl lg:text-4xl font-bold mb-4">for Your Vision</h1>
        
    </div>
</div>
<div>
<div class="bg-gradient-to-br from-gray-600 to-darkgray mx-4 md:mx-8 lg:mx-12 text-slate-100 m-8 md:m-12 p-8 rounded-lg border-2 border-gray-100 shadow-xl">
            <h1 class="font-bold text-2xl md:text-3xl mb-4 text-left">About Us</h1>
            <p class="text-lg md:text-xl leading-relaxed md:leading-[42px]">
                Arusta Creative Production adalah tim profesional yang berdedikasi untuk memberikan solusi kreatif di bidang videografi, fotografi, dan desain grafis. Kami mengkhususkan diri dalam mendokumentasikan momen berharga, baik untuk keperluan pribadi maupun bisnis, dengan hasil yang berkualitas tinggi dan penuh perhatian pada detail. Dengan pengalaman bertahun-tahun, kami memahami pentingnya menciptakan visual yang tidak hanya menarik, tetapi juga dapat menyampaikan cerita Anda dengan kuat. Dari perencanaan hingga eksekusi, kami hadir untuk memastikan setiap proyek yang kami tangani mencerminkan visi Anda secara sempurna.
            </p>
        </div>
</div>
<div class="bg-black text-white">
    <h2 class="text-3xl font-bold text-center">Our Clients</h2>
</div>

        

        <!-- Our Client Section -->
        <div class="w-full relative mt-12 mb-16 p-10">
            

            <!-- FADE EFFECT (Gradient Overlay) -->
            <div class="mx-10 absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-black to-transparent pointer-events-none z-10"></div>
            <div class="mx-10 absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-black to-transparent pointer-events-none z-10"></div>

            <!-- Client Component -->
            <x-client-component></x-client-component>
        </div>
    </div>
@endsection