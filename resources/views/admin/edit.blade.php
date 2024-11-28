@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg mx-auto mt-10">
        <div class="bg-darkgray p-8 border border-gray-300 rounded-lg shadow-lg">
            <h1 class="text-xl font-semibold mb-4 text-white">Edit User</h1>
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-sm font-medium text-white">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required class="mt-1 block w-full px-3 py-2 bg-[#2c2c2c] text-white rounded-lg sm:text-sm">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-white">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required class="mt-1 block w-full px-3 py-2 bg-[#2c2c2c] text-white rounded-lg sm:text-sm">
                </div>
                
                <div class="flex gap-3 justify-end">
                    <div class="flex justify-end">
                        <a href="/admin" class="px-4 py-2 transition duration-200 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-blue-200">Cancel</a>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 transition duration-200 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
