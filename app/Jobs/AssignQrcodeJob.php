<?php

namespace App\Jobs;

use App\User;
use App\Qrcode;
use App\Corporate;
use Carbon\Carbon;
use App\AssignQrcode;
use Laravel\Nova\Nova;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendFCMNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\BroadcastNotification;


class AssignQrcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $id,$assign_reference_number,$quantity,$type,$user_id,$corporate_id,$available_period,$assign_to,$auth_id,$created_from;
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
       $this->auth_id=$assignQrcode->created_by;
       $this->created_from=$assignQrcode->created_from;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   $status=1;
        ($this->assign_to==1) ?  $status=2 :  $status=3;
       $Qrcodes= Qrcode::skip(119650)->where('type',$this->type)
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
       $level='success';
       $message='"' .$this->quantity .'" QR Code Was Assigned Successfully.';
       $url=Nova::path().'/resources/stocks';
       //User::find($this->auth_id)->notify(new BroadcastNotification($level,$message,$url));
       if ($this->corporate_id != NULL) {
        $level='info';
        $Corporate = Corporate::find($this->corporate_id);
        $message = '"' . $this->quantity . '" QR Code Assigned Successfully To ' . $Corporate->name_en . ' from '. $this->created_from;
        $CorporateAdmins = $Corporate->users->where('type', 2);
        foreach ($CorporateAdmins as $user) {
            $user->notify(new BroadcastNotification($level, $message, $url));
        }


        //send notification to admins level
        $admin_message =  '"' . $this->quantity . '" QR Code Assigned Successfully To ' . $Corporate->name_en . ' from '. $this->created_from;;
        $admin_url = Nova::path() . '/resources/assign-qrcodes/' . $this->id;

        $admins = User::superAdmin()->get();
        foreach ($admins as $admin) {
            $admin->notify(new BroadcastNotification('info', $admin_message, $admin_url));
        }
    }
    if ($this->user_id != NULL) {

        $badge =getBadge(User::find($this->user_id));
        if($this->created_from=='new_register')
        {
            $data=sendFreeQRCodeFCM($badge);
        }
        else{
            $data=sendAssignQRCodesToUserFCM($badge,$this->quantity);
        }
       
        User::find($this->user_id)->notify(new SendFCMNotification(User::find($this->user_id),$data));

        //send notification to admins level
        $admin_message =  '"' . $this->quantity . '" QR Code Assigned Successfully To ' . User::find($this->user_id)['name']  . ' from '. $this->created_from;
        $admin_url = Nova::path() . '/resources/assign-qrcodes/' . $this->id;

        $admins = User::superAdmin()->get();
        foreach ($admins as $admin) {
            $admin->notify(new BroadcastNotification('info', $admin_message, $admin_url));
        }
    }

    }
}
