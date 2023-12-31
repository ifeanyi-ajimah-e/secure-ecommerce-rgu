<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $OTP;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($OTP)
    {
        $this->OTP = $OTP;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.otpmail')->with(['OTP' => $this->OTP ]);
    }
}
