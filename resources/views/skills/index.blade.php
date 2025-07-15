
@extends('layouts.public')

@section('title', 'My Skills - Your Name')
@section('description', 'A detailed list of Your Name\'s technical skills in web development, including backend, frontend, and tools.')

@section('content')
    <h1 class="text-4xl font-bold mb-10 text-center text-gray-900">My Skills</h1>

    <div class="space-y-12">
        @forelse($skillsByCategory as $category => $skills)
            <section class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-3xl font-semibold mb-6 text-gray-800">{{ $category }}</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
                    @foreach($skills as $skill)
                        <div class="flex flex-col items-center p-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                            @if($skill->icon_class)
                                <i class="{{ $skill->icon_class }} text-5xl text-blue-600 mb-3 animate-fade-in"></i>
                            @else
                                {{-- Fallback if no icon class --}}
                                <div class="text-5xl text-gray-400 mb-3"><i class="fas fa-code"></i></div>
                            @endif
                            <h3 class="text-xl font-medium text-gray-900 text-center mb-1">{{ $skill->name }}</h3>
                            <p class="text-blue-600 text-sm font-semibold">{{ $skill->proficiency }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        @empty
            <p class="text-center text-gray-600">No skills added yet. Please populate your skills via the admin panel!</p>
        @endforelse
    </div>
@endsection
