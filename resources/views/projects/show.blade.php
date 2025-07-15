{{-- resources/views/projects/show.blade.php --}}
@extends('layouts.public') {{-- Your public layout --}}

@section('title', $project->title)

@section('content')
    <section class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            @if($project->featured_image)
                {{-- Use getFeaturedImageUrlAttribute from model --}}
                <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" class="w-full h-80 object-cover">
            @else
                <div class="w-full h-80 bg-gray-200 flex items-center justify-center text-gray-500 text-2xl font-bold">No Image Available</div>
            @endif

            <div class="p-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $project->title }}</h1>
                @if($project->short_description)
                    <p class="text-xl text-gray-600 mb-6">{{ $project->short_description }}</p>
                @endif

                @if($project->technologies)
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($project->technologies as $tech)
                            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">{{ $tech }}</span>
                        @endforeach
                    </div>
                @endif

                <div class="prose max-w-none text-gray-700 leading-relaxed mb-8">
                    {{-- Use long_description --}}
                    {!! nl2br(e($project->long_description)) !!}
                </div>

                @if($project->screenshots && count($project->screenshots) > 0)
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Screenshots</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                        @foreach($project->screenshot_urls as $screenshotUrl)
                            <img src="{{ $screenshotUrl }}" alt="{{ $project->title }} screenshot" class="w-full h-48 object-cover rounded-lg shadow-sm">
                        @endforeach
                    </div>
                @endif

                <div class="flex flex-wrap gap-4 items-center">
                    @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            Live Demo
                        </a>
                    @endif
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.086 1.838 1.238 1.838 1.238 1.07 1.835 2.809 1.305 3.493.998.108-.77.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.046.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.196-6.091 8.196-11.385 0-6.627-5.373-12-12-12z"></path></svg>
                            GitHub
                        </a>
                    @endif
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('projects.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center">
                        &larr; Back to All Projects
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
