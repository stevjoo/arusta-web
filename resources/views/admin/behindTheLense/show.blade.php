@extends('layouts.app')

@section('title', 'View Behind the Lense')

@section('content')
<div class="max-w-4xl mx-auto mt-10 border-white border-2 bg-darkgray p-6 rounded-lg shadow-lg text-white">
    <h1 class="text-2xl font-bold mb-6 text-center">View Photo</h1>
    <div class="flex flex-col items-center">
        <h2 class="text-xl font-semibold mb-4">{{ $admin_behind_the_lense->title }}</h2>
        <div class="w-full md:w-3/4">
            <img src="{{ Storage::url($admin_behind_the_lense->image_path) }}" alt="Photo" class="w-full rounded-lg border border-gray-500 object-contain">
        </div>
    </div>
    <div class="mt-6 text-center">
        <a href="{{ route('admin-behind-the-lense.index') }}" class="bg-blue-600 hover:bg-blue-800 px-4 py-2 rounded-lg font-medium text-white transition duration-200">
            Back to List
        </a>
    </div>
</div>
@endsection
