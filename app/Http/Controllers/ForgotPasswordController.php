<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ForgotPasswordController extends Controller
{
     function forgotPassword(){
     return view('user.forgot-password');
    }

    function forgotPasswordPost(Request $request){
        $request->validate(['email'=> 'required|email|exists:users']);
        $token=Str::random(64);
        DB::table('password_reset_tokens')->insert([
        'email'=>$request->email,
        'token'=>$token,
         'created_at'=>Carbon::now(),
        ]);
        Mail::send('emails.reset-password',['token'=>$token],function ($message) use ($request){
            $message->to($request->email)->subject('Reset Password');
        });
        return redirect()->route('forgot.password')->with('success','check your email we sent you a reset password');
    }

    function resetPassword($token){
        return view('user.new-password',compact('token'));
    }
    function resetPasswordPost(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
    
        // Check if the password reset token is valid
        $updatePassword = DB::table('password_reset_tokens')
             ->where('email', $request->email)
             ->where('token', $request->token)
             ->first();
                            
        if (!$updatePassword) {
            return redirect()->route('reset.password')->with(['error' => 'Invalid token.']);
        }
    
        // Update the user's password
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
    
        if ($user) {
            // Delete the password reset token
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->delete();
            
            return redirect()->route('user.showLogin')->with(['success' => 'Password reset successfully.']);
        } else {
            return redirect()->route('reset.password')->with(['error' => 'Failed to reset password. Please try again.']);
        }
    }
}
