{{-- resources/views/admin/about-me/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Edit About Me')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit About Me Section</h1>

        <form action="{{ route('admin.about-me.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Success/Error Messages (from your existing layout or partial) --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-700">Your Name</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('name', $aboutMe->name) }}" required>
                    @error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label for="bio" class="block font-medium text-sm text-gray-700">Bio / Introduction</label>
                    <textarea name="bio" id="bio" rows="6" class="form-textarea mt-1 block w-full rounded-md shadow-sm border-gray-300" required>{{ old('bio', $aboutMe->bio) }}</textarea>
                    @error('bio')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Profile Picture --}}
                <div class="md:col-span-2">
                    <label for="profile_picture" class="block font-medium text-sm text-gray-700">Profile Picture</label>
                    @if($aboutMe->profile_picture)
                        <img src="{{ $aboutMe->profile_picture_url }}" alt="Current Profile Picture" class="w-32 h-32 object-cover rounded-full mb-2">
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="remove_profile_picture" id="remove_profile_picture" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="remove_profile_picture" class="ml-2 text-sm text-gray-600">Remove current picture</label>
                        </div>
                    @endif
                    <input type="file" name="profile_picture" id="profile_picture" class="form-input mt-1 block w-full" accept="image/*">
                    @error('profile_picture')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- CV/Resume Upload --}}
                <div class="md:col-span-2">
                    <label for="cv_path" class="block font-medium text-sm text-gray-700">CV / Resume (PDF, DOCX)</label>
                    @if($aboutMe->cv_path)
                        <p class="text-sm text-gray-600 mb-2">Current CV: <a href="{{ $aboutMe->cv_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">View CV</a></p>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="remove_cv" id="remove_cv" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="remove_cv" class="ml-2 text-sm text-gray-600">Remove current CV</label>
                        </div>
                    @endif
                    <input type="file" name="cv_path" id="cv_path" class="form-input mt-1 block w-full" accept=".pdf,.doc,.docx">
                    @error('cv_path')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Social Media Links --}}
                <div class="md:col-span-2 mt-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Social Media Links</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="linkedin_url" class="block font-medium text-sm text-gray-700">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" id="linkedin_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('linkedin_url', $aboutMe->linkedin_url) }}">
                            @error('linkedin_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="github_url" class="block font-medium text-sm text-gray-700">GitHub URL</label>
                            <input type="url" name="github_url" id="github_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('github_url', $aboutMe->github_url) }}">
                            @error('github_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="twitter_url" class="block font-medium text-sm text-gray-700">Twitter/X URL</label>
                            <input type="url" name="twitter_url" id="twitter_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('twitter_url', $aboutMe->twitter_url) }}">
                            @error('twitter_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="facebook_url" class="block font-medium text-sm text-gray-700">Facebook URL</label>
                            <input type="url" name="facebook_url" id="facebook_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('facebook_url', $aboutMe->facebook_url) }}">
                            @error('facebook_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="instagram_url" class="block font-medium text-sm text-gray-700">Instagram URL</label>
                            <input type="url" name="instagram_url" id="instagram_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('instagram_url', $aboutMe->instagram_url) }}">
                            @error('instagram_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="youtube_url" class="block font-medium text-sm text-gray-700">YouTube URL</label>
                            <input type="url" name="youtube_url" id="youtube_url" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300" value="{{ old('youtube_url', $aboutMe->youtube_url) }}">
                            @error('youtube_url')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

            </div> {{-- End of grid --}}

            <div class="flex items-center justify-end mt-8">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Update About Me
                </button>
            </div>
        </form>
    </div>
@endsection
