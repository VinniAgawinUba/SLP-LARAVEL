<?php

namespace App\Http\Controllers;

use App\Models\school_year;
use Illuminate\Http\Request;
use App\Models\college;

class CollegesController extends Controller
{
    public function index($schoolYearId, $semester)
    {
        $schoolYear = school_year::findOrFail($schoolYearId);
        $colleges = college::whereHas('projects', function($query) use ($schoolYearId, $semester) {
            $query->where('school_year_id', $schoolYearId)->where('semester', $semester);
        })->get();
        return view('colleges.index', compact('colleges', 'schoolYear', 'semester'));
    }

    public function show($id, $schoolYearId, $semester)
    {
        $college = college::findOrFail($id);
        $departments = $college->departments()->whereHas('projects', function($query) use ($schoolYearId, $semester) {
            $query->where('school_year_id', $schoolYearId)->where('semester', $semester);
        })->get();
        return view('colleges.show', compact('college', 'departments', 'schoolYearId', 'semester'));
    }
}
