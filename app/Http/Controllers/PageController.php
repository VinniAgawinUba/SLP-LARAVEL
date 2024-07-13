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
        return view ('index');
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

    


    //Admin Panel
    public function admin(){
        return view ('admin.index');
    }

    
    public function RegisterView(){
        // Retrieve All Data from Tables
        $users = User::all(); // Retrieve all Users
        return view('admin.register-view', ['user_list' => $users]);
    }

}
