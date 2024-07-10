<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\college;
use App\Models\department;

class DepartmentsController extends Controller
{
    public function index($collegeId, $schoolYearId, $semester)
    {
        $college = college::findOrFail($collegeId);
        $departments = $college->departments()->whereHas('projects', function($query) use ($schoolYearId, $semester) {
            $query->where('school_year_id', $schoolYearId)->where('semester', $semester);
        })->get();
        return view('departments.index', compact('departments', 'college', 'schoolYearId', 'semester'));
    }

    public function show($id, $collegeId, $schoolYearId, $semester)
    {
        $department = department::findOrFail($id);
        $projects = $department->projects()->where('school_year_id', $schoolYearId)->where('semester', $semester)->get();
        return view('departments.show', compact('department', 'projects', 'schoolYearId', 'semester'));
    }
}
