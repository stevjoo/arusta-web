<div class="flex overflow-hidden relative z-0">
    <div class="flex animate-scroll-auto"> 
        @foreach ($images as $image)
            <div class="m-2 bg-white opacity-90 transition ease-in-out delay-100 hover:opacity-100 border-8 border-white h-36 p-18 w-36 flex items-center justify-center shrink-0 rounded-sm bg-cover bg-center"
                style="background-image: url('{{ $image }}'); background-size: contain; background-repeat: no-repeat;">
            </div>
        @endforeach
    </div>
    <div class="flex animate-scroll-auto">
    {{-- Duplicate Content --}}
        @foreach ($images as $image)
            <div class="m-2 bg-white opacity-90 transition ease-in-out delay-100 hover:opacity-100 border-8 border-white h-36 p-18 w-36 flex items-center justify-center shrink-0 rounded-sm bg-cover bg-center"
                style="background-image: url('{{ $image }}'); background-size: contain; background-repeat: no-repeat;">
            </div>
        @endforeach
    </div>
</div>
