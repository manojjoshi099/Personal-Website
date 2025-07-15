@extends('layouts.public')

@section('title', 'About Me - Your Name')
@section('description', 'Learn more about Your Name, a web developer specializing in Laravel and modern web technologies.')

@section('content')
    <section class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-6 text-center text-gray-900">About Me</h1>
        @if($aboutMe)
            <div class="flex flex-col md:flex-row items-center md:space-x-10">
                @if($aboutMe->profile_picture)
                    <div class="flex-shrink-0 mb-8 md:mb-0">
                        <img src="{{ asset('storage/' . $aboutMe->profile_picture) }}" alt="Profile Picture of Your Name" class="w-64 h-64 rounded-full object-cover shadow-lg border-4 border-blue-300">
                    </div>
                @endif
                <div class="flex-grow">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-800">{{ $aboutMe->title }}</h2>
                    <div class="prose max-w-none text-gray-700 leading-relaxed">
                        {!! $aboutMe->content !!}
                    </div>
                    @if($aboutMe->cv_link)
                        <a href="{{ asset('storage/' . $aboutMe->cv_link) }}" target="_blank" class="inline-block mt-8 px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                            <i class="fas fa-download mr-2"></i> Download My CV
                        </a>
                    @endif
                </div>
            </div>
        @else
            <p class="text-center text-gray-600">No 'About Me' content available yet. Please add it via the admin panel!</p>
        @endif
    </section>
@endsection
