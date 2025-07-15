@extends('layouts.public')

@section('title', 'My Projects')

@section('content')
    <section class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">My Projects</h1>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
            Explore a collection of my recent work, showcasing my skills in web development.
        </p>

        @if($projects->isEmpty())
            <p class="text-center text-gray-500 text-lg">No projects available yet. Check back soon!</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                        <a href="{{ route('projects.show', $project) }}">
                            @if($project->featured_image)

                                <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                            @endif
                        </a>
                        <div class="p-6">
                            <h2 class="font-semibold text-xl text-gray-800 mb-2">{{ $project->title }}</h2>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $project->short_description }}</p>

                            @if($project->technologies)
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach($project->technologies as $tech)
                                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('projects.show', $project) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">View Details &rarr;</a>
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="text-gray-600 hover:text-gray-900" title="GitHub Repo">

                                        <svg class="w-5 h-5 inline-block align-middle" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.086 1.838 1.238 1.838 1.238 1.07 1.835 2.809 1.305 3.493.998.108-.77.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.046.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.196-6.091 8.196-11.385 0-6.627-5.373-12-12-12z"></path></svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $projects->links() }}
            </div>
        @endif
    </section>
@endsection
