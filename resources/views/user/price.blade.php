@extends('layouts.app')

@section('title', 'Price')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arusta Price List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <main class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Price List</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-gray-800 rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Basic</h2>
                <p class="text-4xl font-bold mb-4">30$</p>
                <!-- <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg block text-center">Buy</a> -->
                <ul class="mt-4">
                    <li>Point 1</li>
                    <li>Point 2</li>
                    <li>Point 3</li>
                    <li>Point 4</li>
                </ul>
            </div>
            <div class="bg-gray-800 rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Plus</h2>
                <p class="text-4xl font-bold mb-4">45$</p>
                <!-- <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg block text-center">Buy</a> -->
                <ul class="mt-4">
                    <li>Point 1</li>
                    <li>Point 2</li>
                    <li>Point 3</li>
                    <li>Point 4</li>
                </ul>
            </div>
            <div class="bg-gray-800 rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Premium</h2>
                <p class="text-4xl font-bold mb-4">60$</p>
                <!-- <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg block text-center">Buy</a> -->
                <ul class="mt-4">
                    <li>Point 1</li>
                    <li>Point 2</li>
                    <li>Point 3</li>
                    <li>Point 4</li>
                </ul>
            </div>
        </div>
    </main>
</body>
</html>
@endsection