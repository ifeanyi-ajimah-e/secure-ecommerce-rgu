<?php

namespace App\Models;

use App\Mail\OTPMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role_id', 'type', 'is_active','department','job_description',
        'is_otp_verified','verification_token'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cacheTheOTP()
    {
        $OTP = rand(100000,999999);
        Cache::put([$this->OTPKey() => $OTP], now()->addSeconds(200));
        return $OTP;
    }

    public function OTPKey()
    {
        return "OTP_for_{$this->id}";
    }

    public function sendOTP($via)
    {
        $this->cacheTheOTP();
        if($via == 'sms_otp'){

        }else{
            Mail::to($this->email)->send(new OTPMail($this->cacheTheOTP() ));
        }
    }

    public function OTP()
    {
        return Cache::get($this->OTPKey() );
    }
    
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    
}
