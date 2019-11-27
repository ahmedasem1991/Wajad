<?php

namespace App\Jobs;

use App\Qrcode;
use Carbon\Carbon;
use App\AssignQrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class AssignQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $id,$assign_reference_number,$quantity,$type,$user_id,$corporate_id,$available_period,$assign_to;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AssignQrcode $assignQrcode)
    {
       $this->id=$assignQrcode->id;
       $this->assign_reference_number=$assignQrcode->assign_reference_number;
       $this->quantity=$assignQrcode->quantity;
       $this->type=$assignQrcode->type;
       $this->user_id=$assignQrcode->user_id;
       $this->corporate_id=$assignQrcode->corporate_id;
       $this->available_period=$assignQrcode->available_period;
       $this->assign_to=$assignQrcode->assign_to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   $status=1;
        ($this->assign_to==1) ?  $status=2 :  $status=3;
       $Qrcodes= Qrcode::where('type',$this->type)
       ->where('status','1')->take($this->quantity)->get();
       
       foreach($Qrcodes as $Qrcode)
       {
        $Qrcode->update([
            'assign_reference_number'=>$this->assign_reference_number,
            'status'=>$status,
            'available_period'=>$this->available_period,
            'user_id'=>$this->user_id,
            'corporate_id'=>$this->corporate_id,
            
           ]);
       }
     $AssignQrcode=  AssignQrcode::find($this->id);
     $AssignQrcode->status='finished';
     $AssignQrcode->created_from='web/updated';
     $AssignQrcode->save();
    }
}
