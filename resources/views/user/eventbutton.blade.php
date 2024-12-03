@extends('layouts.app')

@section('title', 'Event')



@section('content')
<div>
    <div class="container lg:flex mx-auto m-6 px-8 justify-center items-center w-3/4">
        <a href="./events" class="m-1 p-2 bg-gray-800 bg-opacity-100 text-gray-100 font-semibold h-72 w-full rounded-md flex items-center justify-center hover:bg-opacity-50">
            <p class="text-center">
                {{ __('Event Schedule') }}
            </p>   
        </a>
    </div>
</div>



@endsection