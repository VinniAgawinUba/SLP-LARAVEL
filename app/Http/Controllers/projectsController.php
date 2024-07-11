<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\school_year;
use App\Models\projects;
use App\Models\college;
use App\Models\department;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
       $schoolYears = school_year::all();
        return view('projects', ['schoolYears' => $schoolYears]);
    }

    public function showsemester(Request $request, $school_year_id)
    {
        return view('projects.show_semester', ['school_year_id' => $school_year_id]);
    }

    public function showcollege(Request $request, $school_year_id, $semester_id)
    {
        // Show Colleges with projects that are in that timeframe
        $projects = projects::where('school_year_id', $school_year_id)
                            ->where('semester', $semester_id)
                            ->get();

        // Get unique colleges from the projects
        $colleges = $projects->pluck('college_id')->unique();
        $colleges = college::whereIn('id', $colleges)->get();

        return view('projects.show_college', [
            'school_year_id' => $school_year_id, 
            'semester_id' => $semester_id, 
            'colleges' => $colleges
        ]);
    }

    public function showdepartment(Request $request, $school_year_id, $semester_id, $college_id)
    {
        // Show Departments with projects that are in that timeframe
        $projects = projects::where('school_year_id', $school_year_id)
                            ->where('semester', $semester_id)
                            ->where('college_id', $college_id)
                            ->get();

        // Get unique departments from the projects
        $departments = $projects->pluck('department_id')->unique();
        $departments = department::whereIn('id', $departments)->get();

        return view('projects.show_department', [
            'school_year_id' => $school_year_id, 
            'semester_id' => $semester_id, 
            'college_id' => $college_id, 
            'departments' => $departments
        ]);
    }

    public function showproject(Request $request, $school_year_id, $semester_id, $college_id, $department_id)
    {
        // Show Projects that are in that timeframe
        $projects = projects::where('school_year_id', $school_year_id)
                            ->where('semester', $semester_id)
                            ->where('college_id', $college_id)
                            ->where('department_id', $department_id)
                            ->get();

        return view('projects.show_project', [
            'school_year_id' => $school_year_id, 
            'semester_id' => $semester_id, 
            'college_id' => $college_id, 
            'department_id' => $department_id, 
            'projects' => $projects
        ]);
    }

    public function showprojectview(Request $request, $project_id)
    {
        $projects = projects::where('id', $project_id)->get();
        return view('projects.show_projectview');
    }
}
