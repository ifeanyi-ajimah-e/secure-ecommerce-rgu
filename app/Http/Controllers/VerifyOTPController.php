<?php

namespace App\Http\Controllers;

use App\Http\Requests\OTPRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VerifyOTPController extends Controller
{
    public function verifyOTP(OTPRequest $request)
    {
        $data = $request->validated();
        // dd(auth()->user()->OTP() );
        // dd( $request->OTP );
        // dd(Cache::get('OTP'));
        // if($request->OTP === Cache::get('OTP')){

        if($data['OTP'] == auth()->user()->OTP() ){
            auth()->user()->update(['is_otp_verified' => true]);
            return redirect('/home');
            // return response(null, 201);
        }
        return back()->withErrors('OTP provided is invalid or expired');
    }

    public function showVerifyForm()
    {
        return view('OTP.verify');
    }

}
