@extends('layouts.app')

@section('title', 'Price')

@section('content')
    <div class="container mx-auto py-10 text-center">
        <h1 class="text-2xl md:text-5xl tracking-[.34em] text-white font-bold mb-10">Price List</h1>
        <div class="grid px-5 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-800 rounded-lg p-6 py-64 border-4 border-white">
                <h2 class="text-5xl font-bold mb-4">Basic</h2>
                <p class="text-4xl font-bold mb-4">Rp.500000</p>
                <!-- <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg block text-center">Buy</a> -->
                <ul class="mt-4">
                    <li>Point 1</li>
                    <li>Point 2</li>
                    <li>Point 3</li>
                    <li>Point 4</li>
                </ul>
            </div>
            <div class="bg-gray-800 rounded-lg p-6 py-64 border-4 border-white">
                <h2 class="text-5xl font-bold mb-4">Plus</h2>
                <p class="text-4xl font-bold mb-4">Rp.750000</p>
                <!-- <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg block text-center">Buy</a> -->
                <ul class="mt-4">
                    <li>Point 1</li>
                    <li>Point 2</li>
                    <li>Point 3</li>
                    <li>Point 4</li>
                </ul>
            </div>
            <div class="bg-gray-800 rounded-lg p-6 py-64 border-4 border-white">
                <h2 class="text-5xl font-bold mb-4">Premium</h2>
                <p class="text-4xl font-bold mb-4">Rp.1000000</p>
                <!-- <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg block text-center">Buy</a> -->
                <ul class="mt-4">
                    <li>Point 1</li>
                    <li>Point 2</li>
                    <li>Point 3</li>
                    <li>Point 4</li>
                </ul>
            </div>
        </div>
</div>
@endsection