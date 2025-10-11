@extends('layouts.admin-layout')

@section('title', 'Create Project')
@section('header', 'Add New Portfolio Project')

@section('content')
    <div class="card p-8 max-w-4xl mx-auto">
        <form method="POST" action="{{ route('admin.portfolio.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-off-white">Project Title (e.g., Modern Kitchen Elegance)</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="material" class="block text-sm font-medium text-off-white">Material Used (e.g., Calacatta Marble)</label>
                    <input type="text" id="material" name="material" value="{{ old('material') }}" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
                </div>
                
                <div>
                    <label for="location" class="block text-sm font-medium text-off-white">Location (e.g., London, UK)</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
                </div>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-off-white">Category</label>
                <select id="category" name="category" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
                    <option value="">Select Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}" @if(old('category') === $cat) selected @endif>{{ ucwords($cat) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image_url" class="block text-sm font-medium text-off-white">Image URL (Link to the project photo)</label>
                <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
            </div>

            <div class="pt-4">
                <button type="submit" class="add-button px-6 py-3 rounded-lg font-bold shadow-lg hover:opacity-90">
                    Save Project
                </button>
            </div>
        </form>
    </div>
@endsection
