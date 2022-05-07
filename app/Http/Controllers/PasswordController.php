<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\email_forgot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function showForgotPasswordForm(){
        return view('user.forgotPassword');
    }

    public function forgotPassword(Request $request){
        $request->validate([
            "email" => 'required|exists:users,email',
        ]);

        // Make Token
        $token = Str::random(64);

        // Insert request to table password_resets
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        // Send Email
        $action_link = route('user.reset.password.form',['token'=>$token,'email'=>$request->email]);
        $body = 'We are received a request to reset password for your <strong>Event Management App</strong> account associated with '.$request->email.'. You can reset your password by clicking the link below';

        // Mail::send('user.email_forgot', ['action_link'=>$action_link,'body'=>$body], function ($message) use ($request) {
        //     $message->to($request->email, 'YourName');
        //     $message->subject('Reset Password Request');
        // });

        $details = [
            'action_link' => $action_link,
            'body' => $body,
            'title' => 'Mail from Event Organizer Web App',
        ];

        Mail::to($request->email)->send(new email_forgot($details));

        return redirect()->back()->with('success','We have sent you email to reset your password , Check your inbox');
    }

    public function showResetPasswordForm(Request $request,$token=null){
        return view('user.resetPassword',[
            'email'=>$request->email,
            'token'=>$token,
        ]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

        // Check Token and Email from DB ->
        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if (!$check_token) {
           return redirect()->back()->withInput()->with('failed','Invalid or Expired Token');
        }else{
            User::where('email','=',$request->email)->update([
                'password'=>Hash::make($request->password),
            ]);
        }

        // Delete Token from DB Table Password_resets
        DB::table('password_resets')->where([
            'email'=>$request->email,
        ])->delete();

        return redirect()->route('login')->with('success','Your password successfully changed! Try login with new password');
    }
}
