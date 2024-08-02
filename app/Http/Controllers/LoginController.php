<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function registerInsert(Request $request){
        //Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        //Insert Data
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //Redirect
        return redirect()->back()->with('success', 'User Registered Successfully');
    }

    public function Checklogin(Request $request){

        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Check if the user exists
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'Wrong Username or Password.');
        }
    
        // If the user signed up with Google, redirect to Google authentication flow
        if ($user->google_id) {
            return redirect()->route('google.auth'); // You need to define this route
        }
    
        // If not a Google account, proceed with traditional authentication
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index')->with('success', 'Logged In Successfully');
        } else {
            return redirect()->back()->with('error', 'Wrong Username or Password.');
        }
    }
    
    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();


        //return to login with message
        return redirect()->route('login')->with('success', 'Logged Out Successfully');
    }
}
