<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PortfoliotController extends Controller
{
    public function form_index()
    {
        $projects = Project::latest()->paginate(20);

        return view('portfolio.portfolio', compact('projects'));
    }


}
