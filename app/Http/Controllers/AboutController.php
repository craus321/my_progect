<?php

namespace App\Http\Controllers;

use App\Models\ProjectsAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutPrice;

class AboutController extends Controller
{
    public function form_about()
    {
        $projects = ProjectsAbout::all();
        $prices = AboutPrice::all();
        return view('about.about_index', compact('projects', 'prices'));
    }

}

