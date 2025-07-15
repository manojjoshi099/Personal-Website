<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class AdminSkillController extends Controller
{
    /**
     * Display a listing of the skills.
     */
    public function index()
    {
        $skills = Skill::orderBy('order')->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created skill in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'order' => 'required|integer',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('status', 'Skill created successfully!');
    }

    /**
     * Display the specified skill.
     */
    public function show(Skill $skill)
    {
        return redirect()->route('admin.skills.edit', $skill);
    }

    /**
     * Show the form for editing the specified skill.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified skill in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'order' => 'required|integer',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('status', 'Skill updated successfully!');
    }

    /**
     * Remove the specified skill from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('status', 'Skill deleted successfully!');
    }
}
