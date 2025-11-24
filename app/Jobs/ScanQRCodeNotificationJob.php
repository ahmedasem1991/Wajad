<?php

namespace App\Jobs;

use App\Notifications\ScanQRCodeNotification;
use App\Qrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScanQRCodeNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $lat;

    private $lng;

    private $qr_code;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request, Qrcode $qr_code)
    {
        $this->lat = $request->lat;
        $this->lng = $request->lng;
        $this->qr_code = $qr_code;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->qr_code->user) {
            // if($this->qr_code->user->receive_emails)
            $this->qr_code->user->notify(new ScanQRCodeNotification($this->lat, $this->lng));
        }
    }
}
