@extends('layouts.admin-layout')

@section('title', 'Portfolio List')
@section('header', 'Manage Portfolio Projects')

@section('content')
    <div class="card p-6">
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.portfolio.create') }}" class="add-button px-4 py-2 rounded-lg font-semibold shadow-md hover:opacity-90">
                + Add New Project
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gold-400">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gold-400">Material</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gold-400">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gold-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($portfolioItems as $item)
                        <tr class="hover:bg-gray-700/30">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->material }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ ucwords($item->category) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-3">
                                <a href="{{ route('admin.portfolio.edit', $item) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $item->title }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
