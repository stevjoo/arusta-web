@extends('layouts.app')

@section('title', 'Edit Behind the Lense')

@section('content')
<div class="max-w-4xl mx-auto mt-10 border-white border-2 bg-darkgray p-6 rounded-lg shadow-lg text-white">
    <h1 class="text-2xl font-bold mb-6">Edit Photo</h1>
    <form method="POST" action="{{ route('admin-behind-the-lense.update', ['admin_behind_the_lense' => $photo->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="title" class="block text-sm font-medium mb-2">Title</label>
            <input 
                type="text" 
                class="w-full px-4 py-2 rounded-lg border border-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none text-black" 
                id="title" 
                name="title" 
                value="{{ $photo->title }}" 
                required>
        </div>
        <div class="mb-5">
            <label for="image" class="block text-sm font-medium mb-2">Change Image</label>
            <input 
                type="file" 
                class="w-full px-4 py-2 rounded-lg border bg-white border-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none text-black" 
                id="image" 
                name="image">
            <div class="mt-3">
                <img src="{{ Storage::url($photo->image_path) }}" alt="Current Photo" class="w-32 h-32 object-cover rounded-lg border border-gray-500">
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-800 px-4 py-2 rounded-lg font-medium text-white transition duration-200">
                Update
            </button>
            <a href="{{ route('admin-behind-the-lense.index') }}" class="bg-gray-500 hover:bg-gray-700 px-4 py-2 rounded-lg font-medium text-white transition duration-200">
                Back to List
            </a>
        </div>
    </form>
</div>
@endsection
