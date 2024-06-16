<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showRegisterationForm(){
        // Before register check if admin exist
       
        return view('admin.register');

    }
    public function register(Request $request){
        //Validate specified values
        $request->validate([
            'first_name'=>'required|required|string|max:28',
            'second_name'=>'required|required|string|max:28',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required',
            
        ]);
        $admin=new Admin();
        $admin->first_name=$request->first_name;
        $admin->second_name=$request->second_name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.login.form');

    }
    public function showlogin(){
        return view('admin.login');
    }


    public function login(Request $request){
        // $validate=$request->only('email','password');
        //   $auth=Auth::guard('admin')->attempt($validate);
        //     return $auth;
        
            $email = $request->input('email');
            $password = $request->input('password');
            
            // Attempt to authenticate the admin
           
           
            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])){
            
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.register.form');

    }

    public function Logout(){
        Auth::logout();
        return ('/');
    }
    public function adminDashboard(){
       
        $users=User::all();
        return  view('admin.dashboard',compact('users'));
    }
}
