@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h1 class="text-3xl font-bold mb-4">Welcome to Your Admin Panel, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-700">Use the navigation above to manage your portfolio content.</p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('admin.about-me.edit') }}" class="block p-6 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                    <i class="fas fa-user-circle text-4xl mb-3"></i>
                    <h2 class="text-xl font-semibold">Manage About Me</h2>
                    <p class="text-sm opacity-90">Edit your professional bio and details.</p>
                </a>
                <a href="{{ route('admin.skills.index') }}" class="block p-6 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    <i class="fas fa-tools text-4xl mb-3"></i>
                    <h2 class="text-xl font-semibold">Manage Skills</h2>
                    <p class="text-sm opacity-90">Add, edit, or remove your technical skills.</p>
                </a>
                <a href="{{ route('admin.projects.index') }}" class="block p-6 bg-purple-500 text-white rounded-lg shadow-md hover:bg-purple-600 transition duration-300">
                    <i class="fas fa-laptop-code text-4xl mb-3"></i>
                    <h2 class="text-xl font-semibold">Manage Projects</h2>
                    <p class="text-sm opacity-90">Add, update, and showcase your portfolio projects.</p>
                </a>
                <a href="{{ route('admin.contact-messages.index') }}" class="block p-6 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition duration-300">
                    <i class="fas fa-envelope text-4xl mb-3"></i>
                    <h2 class="text-xl font-semibold">View Contact Messages</h2>
                    <p class="text-sm opacity-90">Review messages from your contact form.</p>
                </a>
            </div>
        </div>
    </div>
@endsection
