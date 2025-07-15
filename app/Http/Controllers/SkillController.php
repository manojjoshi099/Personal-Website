<?php

namespace App\Http\Controllers;

use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        // Group skills by category for organized display
        $skillsByCategory = Skill::orderBy('order')
            ->get()
            ->groupBy('category');
        return view('skills.index', compact('skillsByCategory'));
    }
}
