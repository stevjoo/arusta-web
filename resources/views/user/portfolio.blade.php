@extends('layouts.app')

@section('title', 'Portfolio')

@section('header')
    <header class="">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight px-2 mx-auto text-center">
                {{ __('Portfolio') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
<div>
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