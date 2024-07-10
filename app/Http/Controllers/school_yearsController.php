<?php

namespace App\Http\Controllers;

use App\Models\school_year;
use Illuminate\Http\Request;

class School_YearsController extends Controller
{
    public function index()
    {
        $schoolYears = school_year::all();
        return view('school_years.index', compact('schoolYears'));
    }

    public function show($id)
    {
        $schoolYear = school_year::findOrFail($id);
        return view('school_years.show', compact('schoolYear'));
    }
}
