<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutMeController extends Controller
{
    public function edit()
    {
        $aboutMe = AboutMes::firstOrCreate([]); // Get the first record or create an empty one
        return view('admin.about-me.edit', compact('aboutMe'));
    }

    public function update(Request $request)
    {
        $aboutMe = AboutMes::firstOrCreate([]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv_path' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB limit
            'remove_profile_picture' => 'nullable|boolean',
            'remove_cv' => 'nullable|boolean',
            'linkedin_url' => 'nullable|url|max:255',   // New validation rules
            'github_url' => 'nullable|url|max:255',     // New validation rules
            'twitter_url' => 'nullable|url|max:255',    // New validation rules
            'facebook_url' => 'nullable|url|max:255',   // New validation rules
            'instagram_url' => 'nullable|url|max:255',  // New validation rules
            'youtube_url' => 'nullable|url|max:255',    // New validation rules
        ]);

        // Handle profile picture
        if ($request->hasFile('profile_picture')) {
            if ($aboutMe->profile_picture) {
                Storage::disk('public')->delete($aboutMe->profile_picture);
            }
            $validated['profile_picture'] = $request->file('profile_picture')->store('about_me', 'public');
        } elseif ($request->boolean('remove_profile_picture')) {
            if ($aboutMe->profile_picture) {
                Storage::disk('public')->delete($aboutMe->profile_picture);
            }
            $validated['profile_picture'] = null;
        } else {
            // Keep existing image if no new one uploaded and not explicitly removed
            unset($validated['profile_picture']);
        }

        // Handle CV upload
        if ($request->hasFile('cv_path')) {
            if ($aboutMe->cv_path) {
                Storage::disk('public')->delete($aboutMe->cv_path);
            }
            $validated['cv_path'] = $request->file('cv_path')->store('about_me', 'public');
        } elseif ($request->boolean('remove_cv')) {
            if ($aboutMe->cv_path) {
                Storage::disk('public')->delete($aboutMe->cv_path);
            }
            $validated['cv_path'] = null;
        } else {
            // Keep existing CV if no new one uploaded and not explicitly removed
            unset($validated['cv_path']);
        }

        $aboutMe->update($validated);

        return redirect()->route('admin.about-me.edit')->with('success', 'About Me section updated successfully!');
    }
}
