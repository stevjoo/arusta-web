@extends('layouts.app')

@section('title', 'Admin Events')

@section('header')
<header class="bg-darkgray shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Events') }}
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
                    <thead class="bg-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                # 
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Start Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                End Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Status
                            </th>
                            
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y bg-white/10 divide-gray-200">
                        @foreach ($events as $index => $event)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $event->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $event->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $event->user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $event->start_date }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $event->end_date }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $event->category }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $event->status }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('events.edit', $event->id) }}" class="px-3 py-2.5 me-2 rounded-lg bg-blue-600 text-white hover:bg-blue-800">Edit</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 text-white rounded-lg bg-red-600 hover:bg-red-800" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                </form>
                                @if($event->status === 'pending')
                                    <form action="{{ route('events.approve', $event->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-3 py-2.5 text-white rounded-lg bg-green-600 hover:bg-green-800">Approve</button>
                                    </form>
                                @endif
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
