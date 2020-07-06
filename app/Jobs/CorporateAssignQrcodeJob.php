<?php

namespace App\Jobs;

use App\Corporate;
use App\User;
use App\Qrcode;
use Laravel\Nova\Nova;
use Illuminate\Bus\Queueable;
use App\CorporateAssignQrcode;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendFCMNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\BroadcastNotification;


class CorporateAssignQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $id,$corporate_assign_reference_number,$quantity,$type,$user_id,$corporate_id,$auth_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CorporateAssignQrcode $assignQrcode)
    {
        
       $this->corporate_assign_reference_number=$assignQrcode->corporate_assign_reference_number;
       $this->id=$assignQrcode->id;
       $this->quantity=$assignQrcode->quantity;
       $this->type=$assignQrcode->type;
       $this->user_id=$assignQrcode->user_id;
       $this->corporate_id=$assignQrcode->corporate_id;
       $this->auth_id=$assignQrcode->created_by;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
       $Corporate_Name=Corporate::find($this->corporate_id)['name_en'];
        
       $Qrcodes= Qrcode::where('type',$this->type)
       ->where('status','3')
       ->where('corporate_id',$this->corporate_id)
       ->whereNull('corporate_assign_reference_number')
       ->take($this->quantity)->get();
       
       foreach($Qrcodes as $Qrcode)
       {
        $Qrcode->corporate_assign_reference_number=$this->corporate_assign_reference_number;
        $Qrcode->user_id=$this->user_id;
        $Qrcode->save();
       }
       $level='success';
       $message='"' .$this->quantity .'" QR Code Was Assigned Successfully to '. User::find($this->user_id)['name'] ;
       $url=Nova::path().'/resources/corporate-assign-qrcodes';
       User::find($this->auth_id)->notify(new BroadcastNotification($level,$message,$url));

       $badge =getBadge(User::find($this->user_id));
       $data=sendCorporateAssignQRCodeFCM($this->quantity,$Corporate_Name,$badge);
       User::find($this->user_id)->notify(new SendFCMNotification(User::find($this->user_id),$data));

    }
}
