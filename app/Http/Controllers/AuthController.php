<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    public function registerUser(Request $request){

        // Validation Rules
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'confirmPassword' => 'required|min:5',
        ]);

        if ($request->password != $request->confirmPassword) {
            return redirect()->back()->with('failed',"password doesn't match !");
        }

        // Pass Validation , Then Save to DB ->

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= Hash::make($request->password);
        $res = $user->save();

        // Check if any added data to DB ->
        if ($res) {
            return redirect()->back()->with('success','Account Registered , Please Login with this account!');
        }else {
            return redirect()->back()->with('failed','Registration failed , Something Went Wrong!');
        }
    }

    public function loginUser(Request $request){
        // Validate First
        $credentials=$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Pass Validation , Check from DB ->

        // Search user email input in DB ->
        $user = User::where('email','=',$request->email)->first();

        // Check user email and password ->
        if ($user) {

            // Check Password
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect()->intended('dashboard');
            }else{
                return redirect()->back()->with('failed','Email & Password mismatch!');
            }
        } else {
            return redirect()->back()->with('failed','Email not registered!');
        }

    }

    public function logout(){
        // Delete session
        if (session()->has('loginId')) {
            session()->pull('loginId');
            return redirect('login')->with('success','Successfully Logged Out');
        }
    }
}
