@extends('layouts.app')

@section('title', 'Add Behind The Lense')

@section('content')
<div class="max-w-4xl mx-auto mt-10 border-white border-2 bg-darkgray p-6 rounded-lg shadow-lg text-white">
    <h1 class="text-2xl font-bold mb-6 text-center">Add New Photo</h1>
    <form method="POST" action="{{ route('admin-behind-the-lense.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium mb-2">Title</label>
            <input 
                type="text" 
                class="w-full px-4 py-2 rounded-lg border border-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none text-black" 
                id="title" 
                name="title" 
                placeholder="Enter photo title" 
                required>
        </div>
        <div>
            <label for="image" class="block text-sm font-medium mb-2">Upload Image</label>
            <input 
                type="file" 
                class="w-full px-4 py-2 rounded-lg border bg-white border-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none text-black" 
                id="image" 
                name="image" 
                required>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-800 px-4 py-2 rounded-lg font-medium text-white transition duration-200">
                Add Photo
            </button>
            <a href="{{ route('admin-behind-the-lense.index') }}" class="bg-gray-500 hover:bg-gray-700 px-4 py-2 rounded-lg font-medium text-white transition duration-200 ml-4">
                Back to List
            </a>
        </div>
    </form>
</div>
@endsection
