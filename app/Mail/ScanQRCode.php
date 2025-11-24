<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScanQRCode extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $goolemap;

    public $title = '';

    public function __construct($lat, $lng, $item)
    {

        $this->goolemap = 'https://www.google.com/maps/search/?api=1&query='
        .$lat
        .','.
        $lng;
        if ($item) {
            $this->title = $item->title;
        }

    }

    public function build()
    {

        return $this->from(env('MAIL_FROM_ADDRESS'))->view('emails.scan_qrcode');
    }
}
