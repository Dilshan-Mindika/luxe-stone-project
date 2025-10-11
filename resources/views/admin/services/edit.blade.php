@extends('layouts.admin-layout')

@section('title', 'Edit Service')
@section('header', 'Edit Service: ' . $service->title)

@section('content')
    <div class="card p-8 max-w-4xl mx-auto">
        <form method="POST" action="{{ route('admin.services.update', $service) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-off-white">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
            </div>
            
            <div>
                <label for="subtitle" class="block text-sm font-medium text-off-white">Subtitle</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $service->subtitle) }}" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-off-white">Full Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label for="hero_image_url" class="block text-sm font-medium text-off-white">Hero Image URL</label>
                <input type="url" id="hero_image_url" name="hero_image_url" value="{{ old('hero_image_url', $service->hero_image_url) }}" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white">
            </div>

            <div class="pt-4 flex justify-between items-center">
                <button type="submit" class="add-button px-6 py-3 rounded-lg font-bold shadow-lg hover:opacity-90">
                    Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="text-gray-400 hover:text-gray-200">Cancel</a>
            </div>
        </form>
    </div>
@endsection
