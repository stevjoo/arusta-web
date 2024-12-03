@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
<div>
    <div class="text-center py-10">
        <h1 class="text-2xl md:text-5xl tracking-[.34em] text-white font-bold">Our Portfolio</h1>
    </div>
    
    <div class="container lg:flex mx-auto m-6 px-8 justify-center items-center w-3/4">
        <a href="./photography" class="m-1 p-2 bg-gray-800 bg-opacity-100 text-gray-100 font-semibold h-72 w-full rounded-md flex items-center justify-center hover:bg-opacity-50">
            <p class="text-center">
                {{ __('Photography') }}
            </p>   
        </a>
        <a href="./graphic-design" class="m-1 p-2 bg-gray-800 bg-opacity-100 text-gray-100 font-semibold h-72 w-full rounded-md flex items-center justify-center hover:bg-opacity-50">
            <p class="text-center">
                {{ __('Graphic Design') }}
            </p>
        </a>
    </div>
</div>



@endsection