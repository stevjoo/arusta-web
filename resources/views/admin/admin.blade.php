@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
        <div class="space-x-5">
            <a href="/admin-behind-the-lense">Behind the Lense</a>
            <a href="/admin-photography">Photography</a>
            <a href="/admin-graphic-design">Graphic Design</a>
            <a href="/admin/events">Event Management</a>
        </div>

        @foreach ($users as $user)
        <div>
            {{ $user->name }}
            @if (!auth()->user()->isAdmin() || !auth()->user()->is($user))
                @if (!$user->isAdmin())
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                @else
                    <span>Cannot delete admin</span>
                @endif
            @endif
        </div>
        @endforeach
    </header>
@endsection
