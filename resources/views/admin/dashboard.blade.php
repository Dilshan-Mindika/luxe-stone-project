@extends('layouts.admin-layout')

@section('title', 'Overview')
@section('header', 'Welcome, Admin (ID: ' . Auth::user()->id . ')')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="card p-6">
        <h3 class="card-header text-xl mb-4">Total Services</h3>
        <p class="text-5xl font-extrabold text-white">{{ App\Models\Service::count() }}</p>
        <a href="{{ route('admin.services.index') }}" class="text-blue-400 hover:text-blue-300 mt-4 inline-block">View Details →</a>
    </div>

    <div class="card p-6">
        <h3 class="card-header text-xl mb-4">Total Portfolio Projects</h3>
        <p class="text-5xl font-extrabold text-white">{{ App\Models\Portfolio::count() }}</p>
        <a href="{{ route('admin.portfolio.index') }}" class="text-blue-400 hover:text-blue-300 mt-4 inline-block">View Details →</a>
    </div>

    <div class="card p-6">
        <h3 class="card-header text-xl mb-4">Quick Link</h3>
        <p class="text-2xl font-bold text-white mb-4">Add New Project</p>
        <a href="{{ route('admin.portfolio.create') }}" class="add-button px-4 py-2 rounded-lg font-semibold shadow-md hover:opacity-90">
            Create Now
        </a>
    </div>

</div>
@endsection
