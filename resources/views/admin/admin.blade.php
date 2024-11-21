@extends('layouts.app')

@section('title', 'Graphic Design')

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
            <a href="/admin-behind-the-lense">Behind the Lense</a>
        </div>
    </header>
@endsection