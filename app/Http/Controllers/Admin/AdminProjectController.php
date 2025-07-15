<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule; // Import for unique slug validation

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title', // Ensure title is unique for slug generation
            'short_description' => 'nullable|string|max:500', // Adjusted max length
            'long_description' => 'nullable|string',
            'technologies' => 'nullable|string', // Expect comma-separated string from form
            'live_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // For multiple files
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Convert technologies string to array
        if (!empty($validatedData['technologies'])) {
            // Convert the comma-separated string into an array
            $validatedData['technologies'] = array_map('trim', explode(',', $validatedData['technologies']));
        } else {
            // If empty, save as null or an empty array []
            $validatedData['technologies'] = null; // Or use [] for an empty array
        }

        // Handle featured_image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('project_images', 'public');
        }

        // Handle screenshots upload (multiple files)
        $screenshotsPaths = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotsPaths[] = $screenshot->store('project_screenshots', 'public');
            }
        }
        $validated['screenshots'] = $screenshotsPaths;

        // Handle boolean checkbox for is_featured (default to false if not checked)
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['order'] = $request->input('order', 0); // Default order to 0 if not provided

        $project = Project::create($validated);
        $project->update($validatedData);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // Convert technologies array to a comma-separated string for textarea editing
        $project->technologies_string = implode(', ', $project->technologies ?? []);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects')->ignore($project->id), // Allow same title for current project
            ],
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'technologies' => 'nullable|string', // Expect comma-separated string from form
            'live_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // For multiple files
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'remove_featured_image' => 'nullable|boolean', // Checkbox for removal
            'remove_screenshot_paths' => 'nullable|array', // Array of paths to remove
        ]);

        // Convert technologies string to array
        if (isset($validated['technologies'])) { // Use isset to check if the key exists
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        } else {
            $validated['technologies'] = null; // If technologies field is empty
        }

        // Handle featured_image upload/removal
        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('project_images', 'public');
        } elseif ($request->boolean('remove_featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $validated['featured_image'] = null;
        } else {
            // Keep existing image if no new one uploaded and not explicitly removed
            unset($validated['featured_image']); // Don't try to update if no change
        }

        // Handle screenshots upload (multiple files) and removal of existing ones
        $currentScreenshots = $project->screenshots ?? [];
        $newScreenshotsPaths = [];

        // Remove selected existing screenshots
        if ($request->has('remove_screenshot_paths') && is_array($request->remove_screenshot_paths)) {
            foreach ($request->remove_screenshot_paths as $pathToRemove) {
                if (($key = array_search($pathToRemove, $currentScreenshots)) !== false) {
                    Storage::disk('public')->delete($pathToRemove);
                    unset($currentScreenshots[$key]);
                }
            }
            $currentScreenshots = array_values($currentScreenshots); // Re-index array
        }

        // Add new screenshots
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $newScreenshotsPaths[] = $screenshot->store('project_screenshots', 'public');
            }
        }
        $validated['screenshots'] = array_merge($currentScreenshots, $newScreenshotsPaths);


        // Handle boolean checkbox for is_featured
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['order'] = $request->input('order', 0); // Default order to 0 if not provided

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete featured image
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        // Delete all screenshots
        if ($project->screenshots) {
            foreach ($project->screenshots as $screenshotPath) {
                Storage::disk('public')->delete($screenshotPath);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
