{{-- resources/views/components/project-card.blade.php --}}
@props(['project']) {{-- Define props to receive the project object --}}

<div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out">
    <a href="{{ route('projects.show', $project->slug) }}">
        @if($project->featured_image)
            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
        @endif
    </a>
    <div class="p-6">
        <h3 class="text-2xl font-bold text-gray-900 mb-2">
            <a href="{{ route('projects.show', $project->slug) }}" class="hover:text-blue-600 transition duration-300">
                {{ $project->title }}
            </a>
        </h3>
        <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ $project->short_description }}</p> {{-- Limit lines --}}

        @if($project->technologies)
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($project->technologies as $tech)
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        @endif

        <div class="flex justify-between items-center text-sm">
            @if($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                </a>
            @endif
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" class="text-gray-700 hover:text-gray-900 flex items-center">
                    <i class="fab fa-github mr-1"></i> GitHub
                </a>
            @endif
        </div>
    </div>
</div>
