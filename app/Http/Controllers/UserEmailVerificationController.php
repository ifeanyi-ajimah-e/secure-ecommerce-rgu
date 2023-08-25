<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerificationEmail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserEmailVerificationController extends Controller
{
    public static function sendEmailVerificationMail($user, $verification_token)
    {
        Mail::to($user['email'])->send(new EmailVerificationEmail($user, $verification_token));
    }

    
    public function verify($email, $token)
    {
    	$user = User::where(['email'=>$email, 'verification_token'=>$token])->first();
    	if ($user) {
    		$user->email_verified_at = Carbon::now();
    		$user->verification_token = null;
    		$user->update();
            Mail::to($user['email'])->send(new WelcomeMail($user));
    		return redirect('email-validated-success')->with('status','Your mail has been everified. Please login');
            
    	}else{
            return redirect('email-validated-fail')->with('status','Your mail has been everified. Please login');
    	}
    }

}
