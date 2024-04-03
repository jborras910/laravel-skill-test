<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Add this line
use Illuminate\Http\Request;

class AuthManager extends Controller
{

    function index(){
        if (Auth::check() && Auth::user()->role === 'admin') {
            $users = User::all();
            return view('admin.welcome', ['users' =>  $users]);
        } else {
            // Redirect to homepage or show an error message
            return redirect()->route('homePage')->with('status', 'Unauthorized access');
        }
    }

    function login(){
        if(Auth::check()){
            // Update active_status column for the logged-in user
            Auth::user()->update(['active_status' => 'active']);
    
            return redirect()->intended(route('home'));
        }
    
        return view('login');
    }





    function registration(){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }
        return view('register');
    }
 

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.*' => 'Please enter a valid password.',
        ]);
    
        $email = $request->input('email');
    
        if (Auth::attempt(['email' => $email, 'password' => $request->input('password')])) {
            // Update active_status column for the logged-in user
            Auth::user()->update(['active_status' => 'active']);
            return redirect()->intended(route('home'))->with('status', 'Login successfully');
        } else {
            return redirect(route('login'))->with('status', 'Incorrect email or password')->withInput($request->only('email'));
        }
    }
    
    
    
    

    function registrationPost(Request $request){

        // dd($request);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'contact' => 'required|digits:11', // Use the 'digits' rule
            'address' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users', // Add the table name 'users'
            'password' => 'required',
        ]);
        

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['middle_name'] = $request->middle_name;
        $data['contact'] = $request->contact;
        $data['address'] = $request->address;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);


        if(!$user){
            return redirect(route('registration'))->with('error', 'Registration failed');
        }else{
        
            return redirect(route('login'))->with('status', 'Registration Successfully');
        }


    }




    function logout(){
        // Check if the user is authenticated
        if(Auth::check()){
            // Update active_status column for the logged-out user
            Auth::user()->update(['active_status' => 'offline']);
        }
    
        // Clear the session and log the user out
        Auth::logout();
    
        // Redirect to the login page
        return redirect(route('login'));
    }
}
