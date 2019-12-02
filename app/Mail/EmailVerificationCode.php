<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerificationCode extends Mailable
{
    use Queueable, SerializesModels;

    public $activation_code;

    public function __construct($activation_code)
    {
        $this->activation_code = $activation_code;
    }

    public function build()
    {
        return $this->from(env('EMAIL_FROM_ADDRESS'))->view('emails.auth.verification_email');
    }
}
