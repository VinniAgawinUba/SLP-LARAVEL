<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Type;
use App\Models\Category;
use App\Models\Recommending_Approval;
use App\Models\Campus;
use App\Models\Request as WorkOrderRequest;
use App\Models\Faculty;
use App\Models\PpoRecommendingApproval;
use App\Models\Ppo_Group;
use App\Models\College;
use App\Models\Department;
use App\Models\School_Year;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{

    public function index(){
        return view ('welcome');
    }

    //Login Page
    public function login(){
        return view ('login');
    }

    //Register Page
    public function register(){
        return view ('register');
    }

    public function aboutUs() {
        return view ('about_us');
    }

    //Frontpage Home Page
    public function home(){

        // Check if user is authenticated
        if (!auth()->check()) {
            // If not authenticated, redirect to home
            return redirect('/login')->with('error', 'Please Login First To Add Requests.');
        }

        //Retrieve All Data from Tables
        $location = Location::all(); // Retrieve all Locations
        $type = Type::all(); // Retrieve all Types
        $Category = Category::all(); // Retrieve all Categories
        $Recommending_approval = Recommending_Approval::all(); // Retrieve all Recommending Approvals
        $Campus = Campus::all(); // Retrieve all Campuses



        //When passing data controller to view, Syntax for example is  return view('viewFilename', ['key' => 'value']);
        //When passing data from model, to controller to view, Syntax for example is  return view('viewFilename', ['key' => value]);
        return view ('home', [
            'location_list'=>$location,
            'type_list'=>$type,
            'category_list'=>$Category,
            'recommending_approval_list'=>$Recommending_approval,
            'campus_list'=>$Campus
        ]);
    }

    public function myRequests(){
        // Check if user is authenticated
        if (!auth()->check()) {
            // If not authenticated, redirect to home
            return redirect('/login')->with('error', 'Please Login First To View Your Requests.');
        }

        // Retrieve all Requests Where User Email is equal to requestor_email in Requests Table
        $requests = WorkOrderRequest::where('requestor_email', auth()->user()->email)->get();

        return view('myrequests', [
            'request_list' => $requests
        ]);
    }


    //Admin Panel
    public function admin(){
        return view ('admin.index');
    }

    //Admin Panel Workorder Views
    public function WorkOrderView(){
        //Retrieve All Requests Data from Requests Table
        $requests = WorkOrderRequest::all(); // Retrieve all Requests
        return view ('admin.request-view', ['request_list'=>$requests]);
    }

    //Admin Panel Workorder Add
    public function WorkOrderadd(){
        //Retrieve All Data from Tables
        $location = Location::all(); // Retrieve all Locations
        $type = Type::all(); // Retrieve all Types
        $Category = Category::all(); // Retrieve all Categories
        $Recommending_approval = Recommending_Approval::all(); // Retrieve all Recommending Approvals
        $Campus = Campus::all(); // Retrieve all Campuses
        return view ('admin.request-add', [
            'location_list'=>$location,
            'type_list'=>$type,
            'category_list'=>$Category,
            'recommending_approval_list'=>$Recommending_approval,
            'campus_list'=>$Campus
        ]);
    }

    //Admin Panel Workorder Edit
    public function WorkOrderedit($id){
        //Retrieve All Data from Tables
        $location = Location::all(); // Retrieve all Locations
        $type = Type::all(); // Retrieve all Types
        $Category = Category::all(); // Retrieve all Categories
        $Recommending_approval = Recommending_Approval::all(); // Retrieve all Recommending Approvals
        $request = WorkOrderRequest::find($id); // Retrieve Request by ID
        $Campus = Campus::all(); // Retrieve all Campuses
        $Ppo_group = Ppo_group::all(); //Retrieve all Ppo Groups
        $Ppo_recommendingapproval = PpoRecommendingApproval::all(); //Retrieve all Ppo Recommending Approvals
        $College = College::all();//Retrieve all College
        $Department = Department::all();//Retrieve all Department
        $School_year = School_year::all();//Retrieve all School Year
        return view ('admin.request-edit', [
            'location_list'=>$location,
            'type_list'=>$type,
            'category_list'=>$Category,
            'recommending_approval_list'=>$Recommending_approval,
            'request'=>$request,
            'campus_list'=>$Campus,
            'ppo_group_list'=>$Ppo_group,
            'ppo_recommending_approval_list'=>$Ppo_recommendingapproval,
            'college_list'=>$College,
            'department_list'=>$Department,
            'school_year_list'=>$School_year
        ]);
    }

    /// test
    public function RecommendingApproval(){
        // Retrieve All Data from Tables
        $recommending_approval_run = Recommending_Approval::all(); // Retrieve all Recommending Approvals
        return view('admin.recommending-approval', ['recommending_approval_run' => $recommending_approval_run]);
    }

    public function FacultyView(){
        // Retrieve All Data from Tables
        $faculty = Faculty::all(); // Retrieve all Faculty
        return view('admin.faculty-view', ['faculty_list' => $faculty]);
    }

    public function PpoRecommendingApprovalView()
    {
        // Retrieve All Data from Tables
        $approvals = PpoRecommendingApproval::all(); // Retrieve all approvals
        return view('admin.PpoRecommendingApprovalView', ['approvals' => $approvals]);
    }

    //Registered Users View
    public function RegisterView(){
        // Retrieve All Data from Tables
        $users = User::all(); // Retrieve all Users
        return view('admin.register-view', ['user_list' => $users]);
    }
}
