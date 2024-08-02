<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\college;
use App\Models\department;
use App\Models\projects;

class DepartmentsController extends Controller
{
    //Front page Side
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


    //Admin Panel Side
    public function DepartmentsView()
    {
        $departments = department::with('college')->get();
        return view('admin.department-view', compact('departments'));
    }

    public function DepartmentsAdd()
    {
        $colleges = college::all();
        return view('admin.department-add', compact('colleges'));
    }

    public function DepartmentsInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'college_id' => 'required',
        ]);

        $department = new department();
        $department->name = $request->name;
        $department->college_id = $request->college_id;
        $department->save();

        return redirect()->route('admin.departmentsView')->with('success', 'Department added successfully.');
    }

    public function DepartmentsEdit($id)
    {
        $department = department::findOrFail($id);
        $colleges = college::all();
        return view('admin.department-edit', compact('department', 'colleges'));
    }

    public function DepartmentsUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'college_id' => 'required',
        ]);

        $department = department::findOrFail($id);
        $department->name = $request->name;
        $department->college_id = $request->college_id;
        $department->save();

        return redirect()->route('admin.departmentsView')->with('success', 'Department updated successfully.');
    }

    public function DepartmentsDelete(Request $request)
    {
        $department = department::findOrFail($request->id);
        $department->delete();

        return redirect()->route('admin.departmentsView')->with('success', 'Department deleted successfully.');
    }

    
}
