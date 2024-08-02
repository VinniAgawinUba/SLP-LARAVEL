<?php

namespace App\Http\Controllers;

use App\Models\school_year;
use Illuminate\Http\Request;

class School_YearsController extends Controller
{
    //Front page Side
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


    //Admin Panel Side

    // View all school years
    public function SchoolYearsView()
    {
        $schoolYears = school_year::all();
        return view('admin.school-years-view', compact('schoolYears'));
    }

    // Show the form to add a new school year
    public function SchoolYearsAdd()
    {
        return view('admin.school-years-add');
    }

    // Insert a new school year
    public function SchoolYearsInsert(Request $request)
    {
        $request->validate([
            'school_year' => 'required|unique:school_years',
        ]);

        $schoolYear = new school_year();
        $schoolYear->school_year = $request->school_year;
        $schoolYear->save();

        return redirect()->route('admin.schoolYearsView')->with('success', 'School year added successfully.');
    }

    // Show the form to edit an existing school year
    public function SchoolYearsEdit($id)
    {
        $schoolYear = school_year::findOrFail($id);
        return view('admin.school-years-edit', compact('schoolYear'));
    }

    // Update an existing school year
    public function SchoolYearsUpdate(Request $request, $id)
    {
        $request->validate([
            'school_year' => 'required|unique:school_years',
        ]);

        $schoolYear = school_year::findOrFail($id);
        $schoolYear->school_year = $request->school_year;
        $schoolYear->save();

        return redirect()->route('admin.schoolYearsView')->with('success', 'School year updated successfully.');
    }

    // Delete an existing school year
    public function SchoolYearsDelete($id)
    {
        $schoolYear = school_year::findOrFail($id);
        $schoolYear->delete();

        return redirect()->route('admin.schoolYearsView')->with('success', 'School year deleted successfully.');
    }
}
