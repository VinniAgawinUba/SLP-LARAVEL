<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faculty;
use App\Models\college;
use App\Models\department;

class FacultiesController extends Controller
{
    public function FacultyView()
    {
        //Find all faculty
        $faculties = faculty::all();
        return view('admin.faculty-view', ['faculty_list' => $faculties]);
    }

    public function FacultyAdd()
    {
        $college = college::all();
        $departments = department::all();
        return view('admin.faculty-add', ['colleges' => $college, 'departments' => $departments]);
    }

    public function FacultyInsert(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'college_id' => 'required',
            'department_id' => 'required',
            'role' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/faculty'), $imageName);
            $validatedData['image'] = 'assets/uploads/faculty/' . $imageName;
        }

        // Create a new Faculty model instance and fill it with the validated data
        $newFaculty = new Faculty();
        $newFaculty->fill($validatedData);

        // Save the new Faculty to the database
        $newFaculty->save();

        return redirect()->route('admin.facultyView')->with('success', 'Faculty added successfully!');
    }


    public function FacultyEdit($id)
    {
        $college = college::all();
        $departments = department::all();
        $faculty = faculty::find($id);
        return view('admin.faculty-edit', ['colleges' => $college, 'departments' => $departments, 'faculty_data' => $faculty]);
    }

    public function FacultyUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'college_id' => 'required',
            'department_id' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the Faculty model to update
        $faculty = Faculty::find($id);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Check if the faculty has an old image and delete it
            if ($faculty->image && file_exists(public_path($faculty->image))) {
                unlink(public_path($faculty->image));
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/faculty'), $imageName);
            $validatedData['image'] = 'assets/uploads/faculty/' . $imageName;
        }

        // Update the Faculty model with the validated data
        $faculty->fill($validatedData);

        // Save the Faculty model to the database
        $faculty->save();

        return redirect()->route('admin.facultyView')->with('success', 'Faculty updated successfully!');
    }

    public function FacultyDelete(Request $request, $id)
    {
        // Find the Faculty model to delete
        $faculty = Faculty::find($request->id);

        if (!$faculty) {
            // If the Faculty model is not found, redirect with an error message
            return redirect()->route('admin.facultyView')->with('error', 'Faculty not found!');
        }

        // Check if the faculty has an old image and delete it
        if ($faculty->image && file_exists(public_path($faculty->image))) {
            unlink(public_path($faculty->image));
        }

        // Delete the Faculty model
        $faculty->delete();

        return redirect()->route('admin.facultyView')->with('success', 'Faculty deleted successfully!');
    }
}
