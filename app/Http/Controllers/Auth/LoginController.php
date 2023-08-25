<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Providers\RouteServiceProvider;
use App\Utils\AdminType;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','resendOtp']);
    }

    public function showLoginForm()
    {
        return view('external.login');
    }

    protected function attemptLogin(Request $request)
    {
        
        $result = $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );

        if (Auth::check()) {
        if(Auth::user()->type != AdminType::ADMIN ){
            Auth::logout();
            return redirect('/login')->with('errordata', 'No business there, sign in here !');
        }
        }
        if($result){
            // $OTP = rand(100000, 999999);
            // Cache::put(['OTP' => $OTP], now()->addMinute(1) );
            // Mail::to($request->email)->send(new OTPMail($OTP));
            // dd($request->otp_via);
            auth()->user()->sendOTP($request->otp_via);

        }
    }

    public function logout(Request $request)
    {
        auth()->user()->update(['is_otp_verified' => 0]);

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin');
    }

    public function resendOtp()
    {
        auth()->user()->sendOTP('email_otp');
        return back()->with('status', 'New OTP sent. Kindly check your email !');
        return back();
    }

    
}
