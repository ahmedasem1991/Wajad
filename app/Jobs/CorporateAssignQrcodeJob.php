<?php

namespace App\Jobs;

use App\Qrcode;
use App\CorporateAssignQrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class CorporateAssignQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $corporate_assign_reference_number,$quantity,$type,$user_id,$corporate_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CorporateAssignQrcode $assignQrcode)
    {
        
       $this->corporate_assign_reference_number=$assignQrcode->corporate_assign_reference_number;
       $this->quantity=$assignQrcode->quantity;
       $this->type=$assignQrcode->type;
       $this->user_id=$assignQrcode->user_id;
       $this->corporate_id=$assignQrcode->corporate_id;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
        
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
    //  $AssignQrcode=  AssignQrcode::find($this->id);
    //  $AssignQrcode->status='finished';
    //  $AssignQrcode->update();
    }
}
