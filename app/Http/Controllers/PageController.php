<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\RunningText;

class PageController extends Controller
{

    public function index()
    {
        return view('index');
    }

    //Login Page
    public function login()
    {
        return view('login');
    }

    //Register Page
    public function register()
    {
        return view('register');
    }

    public function aboutUs()
    {
        return view('about_us');
    }

    //Get Active Running Texts
    public function getRunningTexts()
    {
        $runningTexts = RunningText::where('status', 1)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->get();
        return response()->json($runningTexts);
    }






    //Admin Panel
    public function admin()
    {
        return view('admin.index');
    }


    public function RegisterView()
    {
        // Retrieve All Data from Tables
        $users = User::all(); // Retrieve all Users
        return view('admin.register-view', ['user_list' => $users]);
    }





    // CRUD methods for Running Text
    public function runningText()
    {
        $runningTexts = RunningText::all();
        return view('admin.running-text.running-text-view', ['runningTexts' => $runningTexts]);
    }

    public function createRunningText()
    {
        return view('admin.running-text.running-text-add');
    }

    public function storeRunningText(Request $request)
    {
        // Validate input
        $request->validate([
            'message' => 'required|string|max:255',
            'status' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Create new running text
        RunningText::create([
            'message' => $request->input('message'),
            'status' => $request->input('status'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        return redirect()->route('runningText.view')->with('success', 'Running text created successfully.');
    }

    public function editRunningText($id)
    {
        $runningText = RunningText::findOrFail($id);
        return view('admin.running-text.running-text-edit', ['runningText' => $runningText]);
    }

    public function updateRunningText(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'message' => 'required|string|max:255',
            'status' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Update running text
        $runningText = RunningText::findOrFail($id);
        $runningText->message = $request->input('message');
        $runningText->status = $request->input('status');
        $runningText->start_date = $request->input('start_date');
        $runningText->end_date = $request->input('end_date');
        $runningText->save();

        return redirect()->route('runningText.view')->with('success', 'Running text updated successfully.');
    }

    public function deleteRunningText($id)
    {
        $runningText = RunningText::findOrFail($id);
        $runningText->delete();
        return redirect()->route('runningText.view')->with('success', 'Running text deleted successfully.');
    }
}
