<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function homePage (){
        return view('defaultPage');
    }


     function edit(User $user){
        return view('admin.editUser', ['user' => $user]);
    }


     function create(){
        return view('admin.create');
    }

    function store(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'contact' => 'required|decimal:0,11',
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


        return redirect(route('home'))->with('status', 'User store successfully');



     
    }




     function update(User $user, Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'contact' => 'required|decimal:0,11',
            'address' => 'required',
            'birthday' => 'required',
            'gender' => 'required',       
        ]);

        
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['middle_name'] = $request->middle_name;
        $data['contact'] = $request->contact;
        $data['address'] = $request->address;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;



        $user->update($data);
        return redirect(route('home'))->with('status', 'User updated successfully');


    }




     function destroy(User $user){
        $user->delete();
        return redirect(route('home'))->with('status', 'User Deleted successfully');
    }




}
