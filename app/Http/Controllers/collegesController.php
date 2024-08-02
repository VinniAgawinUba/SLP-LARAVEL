<?php

namespace App\Http\Controllers;

use App\Models\school_year;
use Illuminate\Http\Request;
use App\Models\college;
use App\Models\faculty;

class CollegesController extends Controller
{
    //Front page Side
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



    //Admin Panel Side
    public function CollegesView()
    {
        $colleges = college::with('dean')->get();
        return view('admin.college-view', compact('colleges'));
    }

    public function CollegesAdd()
    {
        $faculty = faculty::all();
        return view('admin.college-add', compact('faculty'));
    }

    public function CollegesInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dean_id' => 'required',
            'logo_image' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max:2048',
        ]);

        $college = new college();
        $college->name = $request->name;
        $college->dean_id = $request->dean_id;

        // Handle the image upload
        if ($request->hasFile('logo_image')) {
            $image = $request->file('logo_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/college_logos/'), $imageName);
            $request['logo_image'] = $imageName;

            // Save the image path in the database
           
            $college->logo_image = $imageName;
            $college->save();
        }

        return redirect()->route('admin.collegesView')->with('success', 'College added successfully!');

        
    }

    public function CollegesEdit($id)
    {
        $college = college::findOrFail($id);
        $faculty = faculty::all();
        return view('admin.college-edit', compact('college', 'faculty'));
    }

    public function CollegesUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'dean_id' => 'required',
            'logo_image' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
        ]);

        $college = college::findOrFail($id);
        $college->name = $request->name;
        $college->dean_id = $request->dean_id;

        // Handle the image upload
        if ($request->hasFile('logo_image')) {
            // Delete the old image if it exists
            if ($college->logo_image) {
                unlink(public_path('assets/uploads/college_logos/' . $college->logo_image));
            }
            $image = $request->file('logo_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/college_logos'), $imageName);
            $request['logo_image'] = $imageName;

            // Save the image path in the database
            $college->logo_image = $imageName;
        }

        $college->save();
        return redirect()->route('admin.collegesView')->with('success', 'College updated successfully!');
    }

    public function CollegesDelete(Request $request, $id)
    {
        $college = college::findOrFail($id);
        if ($college->logo_image) {
            unlink(public_path('assets/uploads/college_logos/' . $college->logo_image));
        }
        $college->delete();
        return redirect()->route('admin.collegesView')->with('success', 'College deleted successfully!');
    }

    
}
