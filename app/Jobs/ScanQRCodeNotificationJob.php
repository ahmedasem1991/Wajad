<?php

namespace App\Jobs;

use App\Qrcode;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\ScanQRCodeNotification;


class ScanQRCodeNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $lat,$lng,$qr_code;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request,Qrcode $qr_code)
    { 
       $this->lat=$request->lat;
       $this->lng=$request->lng;
       $this->qr_code=$qr_code;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {  
        if($this->qr_code->user)
       { 
           $this->qr_code->user->notify(new ScanQRCodeNotification($this->lat,$this->lng));
        }
    }
}
