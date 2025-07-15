@extends('admin.layouts.app')

@section('title', 'Create New Project')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create New Project</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('title') }}" required>
                    @error('title')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="slug" class="block font-medium text-sm text-gray-700">Slug (Auto-generated if empty)</label>
                    <input type="text" name="slug" id="slug" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 bg-gray-50" value="{{ old('slug') }}">
                    @error('slug')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label for="short_description" class="block font-medium text-sm text-gray-700">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="3" class="form-textarea mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('short_description') }}</textarea>
                    @error('short_description')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label for="long_description" class="block font-medium text-sm text-gray-700">Long Description</label>
                    <textarea name="long_description" id="long_description" rows="8" class="form-textarea mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('long_description') }}</textarea>
                    @error('long_description')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="technologies" class="block font-medium text-sm text-gray-700">Technologies (comma-separated)</label>
                    {{-- <input type="text" name="technologies" id="technologies" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('technologies') }}" placeholder="e.g., Laravel, Vue.js, Tailwind CSS"> --}}
                    <input type="text" name="technologies" id="technologies" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('technologies', isset($project) ? implode(', ', $project->technologies ?? []) : '') }}" placeholder="e.g., Laravel, Vue.js, Tailwind CSS">
                    @error('technologies')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="live_url" class="block font-medium text-sm text-gray-700">Live URL</label>
                    <input type="url" name="live_url" id="live_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('live_url') }}">
                    @error('live_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="github_url" class="block font-medium text-sm text-gray-700">GitHub URL</label>
                    <input type="url" name="github_url" id="github_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('github_url') }}">
                    @error('github_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="featured_image" class="block font-medium text-sm text-gray-700">Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image" class="form-input mt-1 block w-full" accept="image/*">
                    @error('featured_image')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="screenshots" class="block font-medium text-sm text-gray-700">Screenshots (Multiple)</label>
                    <input type="file" name="screenshots[]" id="screenshots" class="form-input mt-1 block w-full" multiple accept="image/*">
                    @error('screenshots')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    @error('screenshots.*')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center mt-4">
                    <input type="checkbox" name="is_featured" id="is_featured" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" {{ old('is_featured') ? 'checked' : '' }}>
                    <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured Project</label>
                </div>
                <div>
                    <label for="order" class="block font-medium text-sm text-gray-700">Order</label>
                    <input type="number" name="order" id="order" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('order', 0) }}" required>
                    @error('order')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-8">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Create Project
                </button>
            </div>
        </form>
    </div>
@endsection
