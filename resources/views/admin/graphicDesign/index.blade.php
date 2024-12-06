@extends('layouts.app')

@section('title', 'Admin Graphic Design')

@section('header')
<header class="bg-darkgray shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Graphic Design') }}
        </h2>
    </div>
</header>
@endsection

@section('content')
<div class="max-w-full mx-auto sm:px-0 lg:px-8 mt-5">
    <div class="bg-darkgray overflow-hidden shadow-sm sm:rounded-lg">
        <div class="sm:p-3 md:p-6 bg-black">
            <div class="my-5 me-3 flex justify-end">
                <a href="{{ route('admin-graphic-design.create') }}" class="px-3 py-2 sm:px-4 sm:py-2 bg-blue-600 hover:bg-blue-800 text-white font-bold rounded-lg shadow transition duration-200">
                    Add New Design
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col" class="px-2 sm:px-5 py-3 text-left text-xs sm:text-sm font-semibold text-black uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-2 sm:px-5 py-3 text-left text-xs sm:text-sm font-semibold text-black uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-2 sm:px-5 py-3 text-left text-xs sm:text-sm font-semibold text-black uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col" class="px-2 sm:px-5 py-3 text-left text-xs sm:text-sm font-semibold text-black uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $photo)
                        <tr class="odd:bg-neutral-800 even:bg-neutral-700">
                            <td class="px-2 sm:px-5 py-2 sm:py-5 border-b border-gray-500 text-gray-300 text-sm">
                                {{ $photo->id }}
                            </td>
                            <td class="px-2 sm:px-5 py-2 sm:py-5 border-b border-gray-500 text-gray-300 text-sm">
                                {{ $photo->title }}
                            </td>
                            <td class="px-2 sm:px-5 py-2 sm:py-5 border-b border-gray-500 text-gray-300 text-sm">
                                <img class="w-20 h-20 object-cover" src="{{ Storage::url($photo->image_path) }}" alt="Design">
                            </td>
                            <td class="px-2 sm:px-5 py-2 sm:py-5 border-b border-gray-500 text-gray-300 text-sm">
                                <div class="flex flex-wrap sm:gap-2">
                                    <a href="{{ route('admin-graphic-design.show', $photo->id) }}" class="px-3 py-2 rounded-lg bg-green-600 hover:bg-green-800 text-white transition duration-200 text-xs sm:text-sm">
                                        View
                                    </a>
                                    <a href="{{ route('admin-graphic-design.edit', $photo->id) }}" class="px-3 py-2 rounded-lg bg-blue-600 hover:bg-blue-800 text-white transition duration-200 text-xs sm:text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin-graphic-design.destroy', $photo->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 bg-red-600 hover:bg-red-800 rounded-lg text-white transition duration-200 text-xs sm:text-sm" onclick="return confirm('Are you sure you want to delete this design?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
