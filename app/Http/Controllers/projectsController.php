<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\school_year;
use App\Models\projects;
use App\Models\college;
use App\Models\department;
use App\Models\faculty;
use App\Models\partners;
use App\Models\project_documents;
use App\Models\project_sdgs;
use App\Models\gallery;
use App\Models\gallery_photos;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    //Frontpage Side
    public function index(Request $request)
    {
        $schoolYears = school_year::orderBy('school_year', 'desc')->paginate(8);
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
        $colleges = college::whereIn('id', $colleges)->paginate(8);

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
        $departments = department::whereIn('id', $departments)->paginate(8);

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
            ->paginate(8);

        return view('projects.show_project', [
            'school_year_id' => $school_year_id,
            'semester_id' => $semester_id,
            'college_id' => $college_id,
            'department_id' => $department_id,
            'projects' => $projects
        ]);
    }


    public function showprojectDetails($project_id)
{
    $project = projects::with(['schoolYear', 'college', 'department', 'faculties', 'projectSdgs'])
        ->where('id', $project_id)
        ->first();

    if (!$project) {
        return view('projects.show_project-details', ['project' => null]);
    }

     // Fetch the first gallery photo
     $photo = gallery_photos::where('project_id', $project_id)->first();
    $college = $project->college;
    $department = $project->department;
    //Find partner in partners table
    $partner = partners::find($project->partner_id);
    $schoolYear = $project->schoolYear;
    $dean = $college ? faculty::find($college->dean_id) : null;
    $involvedFaculties = $project->faculties;
    $sdgs = $project->projectSdgs->pluck('sdg');

    return view('projects.show_project-details', compact('project', 'photo', 'college', 'department', 'partner', 'schoolYear', 'dean', 'involvedFaculties', 'sdgs'));
}







    //Admin Panel Side

    public function ProjectsView(Request $request)
    {
        $projects = projects::all();
        return view('admin.project-view', ['projects' => $projects]);
    }

    public function ProjectsAdd()
    {
        $colleges = college::all();
        $departments = department::all();
        $faculties = faculty::all();
        $partners = partners::all();
        $schoolYears = school_year::all();

        $sdgs = [
            'No Poverty', 'Zero Hunger', 'Good Health and Well-being', 'Quality Education',
            'Gender Equality', 'Clean Water and Sanitation', 'Affordable and Clean Energy',
            'Decent Work and Economic Growth', 'Industry, Innovation, and Infrastructure',
            'Reduced Inequality', 'Sustainable Cities and Communities',
            'Responsible Consumption and Production', 'Climate Action',
            'Life Below Water', 'Life on Land', 'Peace, Justice, and Strong Institutions',
            'Partnerships for the Goals'
        ];

        return view('admin.project-add', compact('colleges', 'departments', 'faculties', 'partners', 'schoolYears', 'sdgs'));
    }

    public function ProjectsInsert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'sl_type' => 'required',
            'description' => 'required',
            'subject_hosted' => 'required',
            'college_id' => 'required',
            'department_id' => 'required',
            'sd_coordinator_id' => 'required',
            'partner_id' => 'required',
            'school_year_id' => 'required',
            'semester' => 'required',
            'status' => 'required',
            'faculty' => 'array',
            'sdgs' => 'array',
            'project_documents' => 'array',
            'project_documents.*' => 'file|mimes:pdf,doc,docx,xlsx,xls,csv,txt,jpg,jpeg,png,gif'
        ]);

        // Create a new Project model instance and fill it with the validated data
        $newProject = new projects();
        $newProject->name = $request->name;
        $newProject->sl_type = $request->sl_type;
        $newProject->description = $request->description;
        $newProject->subject_hosted = $request->subject_hosted;
        $newProject->college_id = $request->college_id;
        $newProject->department_id = $request->department_id;
        $newProject->sd_coordinator_id = $request->sd_coordinator_id;
        $newProject->partner_id = $request->partner_id;
        $newProject->school_year_id = $request->school_year_id;
        $newProject->semester = $request->semester;
        $newProject->status = $request->status;
        $newProject->save();

        // Insert faculty members
        $newProject->faculties()->attach($request->faculty);

        // Insert SDGs
        foreach ($request->sdgs as $sdg) {
            $projectSdg = new project_sdgs();
            $projectSdg->project_id = $newProject->id;
            $projectSdg->sdg = $sdg;
            $projectSdg->save();
        }



        // Insert project documents
        if ($request->hasFile('project_documents')){
        foreach ($request->file('project_documents') as $document) {
            $path = $document->store('project_documents');
            $projectDocument = new project_documents();
            $projectDocument->project_id = $newProject->id;
            $projectDocument->file_name = $document->getClientOriginalName();
            $projectDocument->file_type = $document->getClientMimeType();
            $projectDocument->file_size = $document->getSize();
            $projectDocument->file_path = $path;
            $projectDocument->save();
        }
    }
        //Auto create gallery for the project
        $newGallery = new gallery();
        $newGallery->project_id = $newProject->id;
        $newGallery->name = "Gallery For $newProject->name";
        $newGallery->save();

        return redirect()->route('admin.projectsView')->with('success', 'Project added successfully!');
    }

    public function ProjectsEdit(Request $request, $id)
    {
        $project = projects::with('faculties', 'projectDocuments', 'projectSdgs')->findOrFail($id);
        $colleges = college::all();
        $departments = department::all();
        $faculties = faculty::all();
        $partners = partners::all();
        $schoolYears = school_year::all();

        $sdgs = [
            'No Poverty', 'Zero Hunger', 'Good Health and Well-being', 'Quality Education',
            'Gender Equality', 'Clean Water and Sanitation', 'Affordable and Clean Energy',
            'Decent Work and Economic Growth', 'Industry, Innovation, and Infrastructure',
            'Reduced Inequality', 'Sustainable Cities and Communities',
            'Responsible Consumption and Production', 'Climate Action',
            'Life Below Water', 'Life on Land', 'Peace, Justice, and Strong Institutions',
            'Partnerships for the Goals'
        ];

        return view('admin.project-edit', compact('project', 'colleges', 'departments', 'faculties', 'partners', 'schoolYears', 'sdgs'));
    }

    public function IndividualProjectDocumentDelete($id)
    {
        $document = project_documents::find($id);
        if ($document) {
            // Remove the document file from storage
            Storage::delete($document->file_path);
            
            // Delete the document record from the database
            $document->delete();
            
            return redirect()->back()->with('success', 'Document deleted successfully!');
        }
        return redirect()->back()->with('error', 'Document not found!');
    }
    


    public function ProjectsUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'sl_type' => 'required',
            'description' => 'required',
            'subject_hosted' => 'required',
            'college_id' => 'required',
            'department_id' => 'required',
            'sd_coordinator_id' => 'required',
            'partner_id' => 'required',
            'school_year_id' => 'required',
            'semester' => 'required',
            'status' => 'required',
            'faculty' => 'required|array',
            'sdgs' => 'required|array',
            'project_documents.*' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls,csv,txt,jpg,jpeg,png,gif'
        ]);

        // Find the project
        $project = projects::findOrFail($id);

        // Update project details
        $project->update($request->only([
            'name', 'sl_type', 'description', 'subject_hosted', 'college_id',
            'department_id', 'sd_coordinator_id', 'partner_id', 'school_year_id',
            'semester', 'status'
        ]));

        // Update faculty members
        foreach ($project->faculties as $faculty) {
            $project->faculties()->detach($faculty->id);
        }
        $project->faculties()->attach($request->faculty);

        // Update SDGs
        $project->projectSdgs()->delete();
        foreach ($request->sdgs as $sdg) {
            $projectSdg = new project_sdgs();
            $projectSdg->project_id = $project->id;
            $projectSdg->sdg = $sdg;
            $projectSdg->save();
        }

        

            // Add new documents
            if ($request->hasFile('project_documents')){
            foreach ($request->file('project_documents') as $document) {
                $path = $document->store('project_documents');
                $projectDocument = new project_documents();
                $projectDocument->project_id = $project->id;
                $projectDocument->file_name = $document->getClientOriginalName();
                $projectDocument->file_type = $document->getClientMimeType();
                $projectDocument->file_size = $document->getSize();
                $projectDocument->file_path = $path;
                $projectDocument->save();
            }
        }

        return redirect()->route('admin.projectsView')->with('success', 'Project updated successfully!');
    }

    public function ProjectsDelete(Request $request, $id)
    {
        // Find the project
        $project = projects::findOrFail($id);
    
        // Delete associated project documents
        $project->projectDocuments()->delete();
    
        // Delete the project itself
        $project->delete();
    
        return redirect()->route('admin.projectsView')->with('success', 'Project deleted successfully!');
    }
    
}
