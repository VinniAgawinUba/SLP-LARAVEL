<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisteredUserController extends Controller
{

    //View Add Registered Users
    public function RegisterAdd(){

        return view('admin.register-add');
    }

    //View Edit Registered Users
    public function RegisterEdit($id)
    {
        $user = User::find($id);
        return view('admin.register-edit', compact('user'));
    }

    //Add Registered User
    public function registerInsert(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'auth_role' => 'required',
        ]);

        // Create a new user instance
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'auth_role' => $request->auth_role,
        ]);

        return redirect()->route('admin.registerView')->with('success', 'User added successfully!');
    }

    //Updated Registered User
    public function registerUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'auth_role' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->auth_role = $request->auth_role;
        $user->save();

        return redirect()->route('admin.registerView')->with('success', 'User updated successfully!');
    }

    //Delete Registered User
    public function registerDelete(Request $request)
    {
        User::destroy($request->id);
        return redirect()->route('admin.registerView')->with('success', 'User deleted successfully!');
    }
}
