<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Order by 'order' if you want custom ordering, otherwise by 'created_at' or 'title'
        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->paginate(9);
        return view('projects.index', compact('projects'));
    }

    /**
     * Display the specified project.
     *
     * @param  \App\Models\Project  $project (Laravel's Route Model Binding will find by slug)
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
