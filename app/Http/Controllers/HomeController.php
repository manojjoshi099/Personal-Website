<?php

namespace App\Http\Controllers;

use App\Models\AboutMes;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $aboutMe = AboutMes::first(); // Your existing AboutMe data
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('order') // Order by custom order if set
            ->orderBy('created_at', 'desc')
            ->limit(3) // Show only 3 featured projects
            ->get();

        return view('home', compact('aboutMe', 'featuredProjects'));
    }
}
