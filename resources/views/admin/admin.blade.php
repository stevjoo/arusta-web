@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('header')
<header class="bg-darkgray shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Dashboard') }}
        </h1>
    </div>
</header>
@endsection

@section('content')
    <div class="mt-4 mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y bg-white/10 divide-gray-200 h-56">
                            @foreach ($users as $user)
                            <tr class="odd:bg-neutral-800 even:bg-neutral-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $user->getRoleName() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if (!$user->isAdmin())
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="px-3 py-2.5 me-2 rounded-lg bg-blue-600 text-white hover:bg-blue-800">Edit</a>
                                        
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-2 text-white rounded-lg bg-red-600 hover:bg-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>

                                        @if($user->review)
                                            <div class="relative inline-block" x-data="{ open: false }">
                                                <button @click="open = !open" class="px-3 py-2 text-white rounded-lg bg-green-600 hover:bg-green-800 ml-2">
                                                    Manage Review
                                                </button>
                                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-96 bg-white rounded-lg shadow-lg z-50">
                                                    <div class="p-4">
                                                        <div class="mb-4 p-3 bg-gray-100 rounded">
                                                            <div class="flex justify-between items-start">
                                                                <div>
                                                                    <p class="text-gray-800">Rating: {{ $user->review->star_rating }}/5</p>
                                                                    <p class="text-gray-600 mt-1">{{ $user->review->comments }}</p>
                                                                </div>
                                                                <form action="{{ route('review.destroy', $user->review->id) }}" method="POST" class="ml-2">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="px-2 py-1 text-white rounded bg-red-600 hover:bg-red-800" onclick="return confirm('Delete this review?')">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
