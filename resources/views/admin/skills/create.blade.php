@extends('admin.layouts.app')

@section('title', 'Create New Skill')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create New Skill</h1>

        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-700">Skill Name</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('name') }}" required>
                    @error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="category" class="block font-medium text-sm text-gray-700">Category</label>
                    <select name="category" id="category" class="form-select mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="">Select Category</option>
                        <option value="Frontend" {{ old('category') == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="Backend" {{ old('category') == 'Backend' ? 'selected' : '' }}>Backend</option>
                        <option value="Databases" {{ old('category') == 'Databases' ? 'selected' : '' }}>Databases</option>
                        <option value="Tools & DevOps" {{ old('category') == 'Tools & DevOps' ? 'selected' : '' }}>Tools & DevOps</option>
                        <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('category')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="proficiency" class="block font-medium text-sm text-gray-700">Proficiency</label>
                    <select name="proficiency" id="proficiency" class="form-select mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="">Select Proficiency</option>
                        <option value="Beginner" {{ old('proficiency') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="Intermediate" {{ old('proficiency') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="Advanced" {{ old('proficiency') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        <option value="Expert" {{ old('proficiency') == 'Expert' ? 'selected' : '' }}>Expert</option>
                    </select>
                    @error('proficiency')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="icon_class" class="block font-medium text-sm text-gray-700">Icon Class (e.g., fas fa-database)</label>
                    <input type="text" name="icon_class" id="icon_class" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('icon_class') }}" placeholder="Font Awesome class">
                    <p class="text-xs text-gray-500 mt-1">Visit Font Awesome for icons: <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600 hover:underline">fontawesome.com/icons</a></p>
                    @error('icon_class')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="order" class="block font-medium text-sm text-gray-700">Order</label>
                    <input type="number" name="order" id="order" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('order', 0) }}" required>
                    <p class="text-xs text-gray-500 mt-1">Lower numbers appear first.</p>
                    @error('order')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-8">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Create Skill
                </button>
            </div>
        </form>
    </div>
@endsection
