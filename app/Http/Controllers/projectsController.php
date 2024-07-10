<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\school_year;
use App\Models\projects;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
       $schoolYears = school_year::all();
        return view('projects', ['schoolYears' => $schoolYears]);
    }

    public function showsemester(Request $request, $school_year_id)
    {
        $projects = projects::where('school_year_id', $school_year_id)->get();
        return view('projects.show_semester', ['projects' => $projects]);
    }
}
