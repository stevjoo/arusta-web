@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-4xl font-bold text-center mb-8">Edit Event</h1>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('events.update', $data->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $data->title) }}" class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $data->start_date) }}" class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('start_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $data->end_date) }}" class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('end_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="Paket 1" {{ $data->category == 'Paket 1' ? 'selected' : '' }}>Paket 1</option>
                    <option value="Paket 2" {{ $data->category == 'Paket 2' ? 'selected' : '' }}>Paket 2</option>
                    <option value="Paket 3" {{ $data->category == 'Paket 3' ? 'selected' : '' }}>Paket 3</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" id="status" value="{{ old('status', $data->status) }}" class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" disabled>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-500 text-white text-sm font-bold py-2 px-6 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">Update Event</button>
                <a href="{{ route('admin.events') }}" class="bg-gray-500 text-white text-sm font-bold py-2 px-6 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 transition duration-200">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
