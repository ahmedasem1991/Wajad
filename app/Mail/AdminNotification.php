<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotification extends Mailable
{ 
    use Queueable, SerializesModels;


    public $body;
    

    public function __construct($body)
    {

        $this->body=$body;
        
    }

    public function build()
    {
         
        return $this->from(env('MAIL_FROM_ADDRESS'))->view('emails.admin_notification');
    }
}
