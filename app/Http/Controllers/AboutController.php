<?php

namespace App\Http\Controllers;

use App\Models\AboutMes;

class AboutController extends Controller
{
    public function index()
    {
        $aboutMe = AboutMes::first();
        return view('about.index', compact('aboutMe'));
    }
}
