@extends('layouts.public')

@section('title', 'Manoj Kumar Joshi - Web Developer Portfolio')
@section('description', 'Showcasing web development projects and skills in Laravel, Vue.js, and more.')

@section('content')
    <section id="hero"
        class="text-center py-16 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-xl mb-12">
        <h1 class="text-5xl font-extrabold mb-4 animate-fade-in-down">Hi, I'm Manoj Kumar Joshi</h1>
        <p class="text-xl mb-6 animate-fade-in-up">A passionate Web Developer focused on building amazing digital experiences
            with Laravel.</p>
        <a href="{{ route('contact.index') }}"
            class="bg-white text-blue-600 px-8 py-3 rounded-full text-lg font-semibold hover:bg-blue-100 transition duration-300 shadow-lg">Get
            in Touch</a>
    </section>

    @if ($aboutMe)
        <section id="about-me" class="mb-12 bg-white p-8 rounded-lg shadow-lg">
            <div class="flex flex-col md:flex-row items-center md:space-x-8">
                @if ($aboutMe->profile_picture)
                    <div class="flex-shrink-0 mb-6 md:mb-0">
                        <img src="{{ asset('storage/' . $aboutMe->profile_picture) }}" alt="Profile Picture of Your Name"
                            class="w-48 h-48 rounded-full object-cover shadow-md border-4 border-blue-200">
                    </div>
                @endif
                <div>
                    <h2 class="text-4xl font-bold mb-4 text-gray-900">{{ $aboutMe->name }}</h2>
                    <div class="prose max-w-none text-gray-700">
                        {!! $aboutMe->bio !!}
                    </div>
                    @if ($aboutMe->cv_link)
                        <a href="{{ asset('storage/' . $aboutMe->cv_link) }}" target="_blank"
                            class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                            <i class="fas fa-download mr-2"></i> Download CV
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <section id="featured-projects" class="mb-12">
        <h2 class="text-4xl font-bold text-center mb-8 text-gray-900">Featured Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredProjects as $project)
                <x-project-card :project="$project" />
            @empty
                <p class="col-span-full text-center text-gray-500">No featured projects available yet.</p>
            @endforelse
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('projects.index') }}"
                class="px-8 py-3 bg-purple-600 text-white rounded-full text-lg font-semibold hover:bg-purple-700 transition duration-300 shadow-lg">View
                All Projects</a>
        </div>
    </section>
    {{-- <section class="featured-projects-section container mx-auto px-4 py-12">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Featured Projects</h2>
        @if ($featuredProjects->isEmpty())
            <p class="text-center text-gray-500 text-lg">No featured projects available yet. Check back soon!</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredProjects as $project)
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                        <a href="{{ route('projects.show', $project) }}">
                            @if ($project->featured_image)
                                <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">No Image
                                </div>
                            @endif
                        </a>
                        <div class="p-6">
                            <h3 class="font-semibold text-xl text-gray-800 mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $project->short_description }}</p>


                            @if ($project->technologies)
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach ($project->technologies as $tech)
                                        <span
                                            class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('projects.show', $project) }}"
                                    class="text-indigo-600 hover:text-indigo-800 font-medium">View Details &rarr;</a>
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank"
                                        class="text-gray-600 hover:text-gray-900" title="GitHub Repo">

                                        <svg class="w-5 h-5 inline-block align-middle" fill="currentColor"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.086 1.838 1.238 1.838 1.238 1.07 1.835 2.809 1.305 3.493.998.108-.77.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.046.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.196-6.091 8.196-11.385 0-6.627-5.373-12-12-12z">
                                            </path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('projects.index') }}"
                    class="btn inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                    View All Projects
                </a>
            </div>
        @endif
    </section> --}}
@endsection
