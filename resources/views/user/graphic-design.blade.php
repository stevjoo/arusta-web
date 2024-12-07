@extends('layouts.app')

@section('title', 'Graphic Design')

@section('content')
<div class="motion-preset-focus bg-black min-h-screen flex flex-col items-center">
    <!-- Header -->
    <div class="text-center py-10">
        <h1 class="text-2xl md:text-5xl tracking-[.34em] text-white font-bold">Our Portfolio</h1>
    </div>

    <div 
        class="w-5/6 py-16 text-white text-center rounded-xl mb-10 bg-cover bg-center relative"
        style="background-image: url('{{ asset('asset/GraphicDesign/banner.webp') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50 rounded-xl"></div>
        <h1 class="relative text-3xl font-bold">Graphic Design</h1>
    </div>


    <!-- Grid Foto -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 px-4 pb-10">
        @foreach ($photos as $photo)
            <div class="bg-black rounded-lg overflow-hidden shadow-md">
                <!-- Foto dalam rasio 1:1 -->
                <div class="relative w-[367px] h-[367px] cursor-pointer hover:scale-105 transition duration-200 ease-out" onclick="openModal('{{ Storage::url($photo->image_path) }}')">
                    <img src="{{ Storage::url($photo->image_path) }}" 
                         alt="{{ $photo->title }}" 
                         class="absolute top-0 left-0 w-full h-full object-cover rounded-lg">
                </div>
            </div>
        @endforeach
    </div>
</div>

<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="relative">
        <img id="modalImage" src="" alt="Photo" class="md:max-w-[500px] md:max-h-[500px] max-w-[250px] max-h-[250px] rounded-lg">
        <div>
            <button onclick="closeModal()" class="bg-black/75 hover:bg-black transition duration-200 rounded-full px-2 absolute top-2 right-2 text-white text-2xl font-bold">&times;</button>
        </div>
    </div>
</div>

<script>
    function openModal(imageUrl) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl; 
        modal.classList.remove('hidden'); 
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden'); 
    }
</script>
@endsection
